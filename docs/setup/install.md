# Installation

Cachet is an open source replacement to [StatusPage.io](https://statuspage.io) written in PHP and the [Laravel](http://laravel.com) framework.

You need at least PHP >= 5.4, [Composer](https://getcomposer.org/) and the following PHP extensions installed to run Cachet:

  - `php-mcrypt`
  - `php-mbstring`
  - `php-apc`
  - `php-xml`
  - `php-pdo`
  - A database driver for your DB, such as `php-mysql`
  - `OpenSSL`

# Table of contents

1. [Get a copy!](#get-a-copy)
2. [Deploy to Heroku](#deploy-to-heroku)
3. [Configuring a database!](#configuring-a-database)
    1. [Running database migrations](#running-database-migrations)
    2. [Seeding](#seeding)
4. [Running Cachet](#running-cachet)
    1. [Apache setup](#apache)
    2. [nginx setup](#nginx)
5. [Environment detection](#environment-detection)

# Get a copy!

> If you want to run Cachet locally or help develop then you'll want to use this method.

The easiest way is to use Git to pull down the code. You'll need to put it into your web server directory for Apache & Nginx.

```bash
$ cd /var/www
$ git clone https://github.com/cachethq/Cachet.git
$ cd Cachet
$ composer install --no-dev -o
```

If you don't want to compile the assets yet, you may want to run composer with the `--no-scripts` flag.

# Deploy to Heroku

When using the **Deploy to Heroku** button you needn't worry about using a database as the install will setup a free instance of ClearDB. Once installed Heroku can direct you to the setup page where you'll configure the site/application information and create an administrator account.

# Configuring a database without Heroku

Cachet relies on a database to store the components and incidents, however it needs to be configured for your [environment](https://github.com/cachethq/Cachet/blob/master/INSTALL.md#environment-detection).

Our database configuration (`./app/config/database.php`) is setup to require the following environment variables:

- `DB_DRIVER` - `sqlite`, `mysql`, `pgsql` or `sqlsrv`.
- `DB_HOST`
- `DB_DATABASE` - SQLite file within the `app/database` directory or database name.
- `DB_USERNAME`
- `DB_PASSWORD`

Laravel uses PDO for its database driver so it should be compatible with:

- SQLite
- MySQL
- Postgresql
- MSSQL

No `.sqlite` file is included, so be sure to add this into your `app/database` directory.

Laravel 4 enables you to [protect your sensitive configuration details](http://laravel.com/docs/4.2/configuration#protecting-sensitive-configuration) with the use of .env files. For your production environment, create a `.env.php` file in the root of your project, or for environment specific create the file named `.env.environment.php`.

For example, if working locally with MySQL, your `.env.local.php` file would be:

```php
<?php

return [
    'DB_DRIVER'   => 'mysql',
    'DB_HOST'     => 'localhost',
    'DB_DATABASE' => 'cachet',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => 'secret',
];
```

> Even though SQLite doesn't require a host, username or password, these still must be set (an empty string will suffice).

### Running database migrations

Once we've decided on our database, we now need to run the migrations to create the tables. In our command line we need to run the migrations, from within the root directory:

```bash
$ php artisan migrate
```

You should see the output of the current project migration files being migrated to your database.

### Seeding

If you're getting Cachet setup to develop on, then you may want to seed the database with some example data.

```bash
$ php artisan db:seed
```

# Running Cachet

## Apache

Apache is one of the easier installations. We simply need to create a new Virtual Host and add it to our `HOSTS` file.

We simply add the following Virtual Host to our `httpd-vhosts.conf` file:

```
<VirtualHost *:80>
    ServerName cachet.dev # Or whatever you want to use
    ServerAlias cachet.dev # Make this the same as ServerName
    DocumentRoot "/var/www/Cachet/public"
    <Directory "/var/www/Cachet/public">
        Require all granted # Used by Apache 2.4
        Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

Next we add a lookup on our `HOSTS` file (if we're not serving Cachet externally). So open up `/etc/hosts` or on Windows it'll be `C:\Windows\System32\drivers\etc\hosts` and add this line:

```
127.0.0.1 cachet.dev
```

Restart Apache and you're done!

## nginx

- Install php5-fpm
- Generate your SSL key+certificate
- Create a new vhost such as `/etc/nginx/sites-enabled/cachet.conf`:

```
# Upstream to abstract backend connection(s) for php
upstream php {
    server unix:/tmp/php-cgi.socket;
    server 127.0.0.1:9000;
}

server {
    server_name  cachet.mycompany.com; # Or whatever you want to use
    listen 80 default;
    rewrite ^(.*) https://cachet.mycompany.com$1 permanent;
}

# HTTPS server

server {
    listen 443;
    server_name cachet.mycompany.com;

    root /var/vhost/cachet.mycompany.com/public;
    index index.php;

    ssl on;
    ssl_certificate /etc/ssl/crt/cachet.mycompany.com.crt; # Or wherever your crt is
    ssl_certificate_key /etc/ssl/key/cachet.mycompany.com.key; # Or wherever your key is
    ssl_session_timeout 5m;

    # Best practice as at March 2014
    ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
    ssl_prefer_server_ciphers on;
    ssl_ciphers "ECDHE-RSA-AES128-GCM-SHA256:ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES256-GCM-SHA384:ECDHE-ECDSA-AES256-GCM-SHA384:DHE-RSA-AES128-GCM-SHA256:DHE-DSS-AES128-GCM-SHA256:kEDH+AESGCM:ECDHE-RSA-AES128-SHA256:ECDHE-ECDSA-AES128-SHA256:ECDHE-RSA-AES128-SHA:ECDHE-ECDSA-AES128-SHA:ECDHE-RSA-AES256-SHA384:ECDHE-ECDSA-AES256-SHA384:ECDHE-RSA-AES256-SHA:ECDHE-ECDSA-AES256-SHA:DHE-RSA-AES128-SHA256:DHE-RSA-AES128-SHA:DHE-DSS-AES128-SHA256:DHE-RSA-AES256-SHA256:DHE-DSS-AES256-SHA:DHE-RSA-AES256-SHA:AES128-GCM-SHA256:AES256-GCM-SHA384:AES128-SHA256:AES256-SHA256:AES128-SHA:AES256-SHA:AES:CAMELLIA:DES-CBC3-SHA:!aNULL:!eNULL:!EXPORT:!DES:!RC4:!MD5:!PSK:!aECDH:!EDH-DSS-DES-CBC3-SHA:!EDH-RSA-DES-CBC3-SHA:!KRB5-DES-CBC3-SHA";
    ssl_buffer_size 1400; # 1400 bytes, within MTU - because we generally have small responses. Could increase to 4k, but default 16k is too big

    location / {
        add_header Strict-Transport-Security max-age=15768000;
        try_files $uri /index.php$is_args$args;
    }

    location ~ \.php$ {
                include fastcgi_params;
                fastcgi_pass unix:/var/run/php5-fpm.sock;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                fastcgi_index index.php;
                fastcgi_keep_conn on;
                add_header Strict-Transport-Security max-age=15768000;
    }
}
```
Start php5-fpm and nginx and you're done!

# Environment Detection

If you're deploying into production you'll want to create an environmental variable as `ENV=production`. In the instance where the variable isn't defined, Cachet will think that it's `local`.

# Security

After deploying to a server that isn't [Heroku](#heroku) you should run `php artisan key:generate` before setting Cachet up. This changes the application key (found in `/app/config/app.php`) which is used for encryption.
