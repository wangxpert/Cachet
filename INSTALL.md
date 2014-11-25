# Installation

Cachet is an open source replacement to [StatusPage.io](https://statuspage.io) written in PHP and the [Laravel](http://laravel.com) framework.

You need at least PHP, [Composer](https://getcomposer.org/) and the `php-mcrypt` extension installed to run Cachet.

# Table of contents

1. [Get a copy!](#get-a-copy)
2. [Deploy to Heroku](#deploy-to-heroku)
3. [Configuring a database!](#configuring-a-database)
	1. [Running database migrations](#running-database-migrations)
4. [Running Cachet](#running-cachet)
	1. [Apache setup](#apache)
	2. [nginx setup](#nginx)
5. [Environment detection](#environment-detection)

# Get a copy!

> If you want to run Cachet locally or help develop then you'll want to use this method.

The easiest way is to use Git to pull down the code. You'll need to put it into your web server directory for Apache & Nginx.

```bash
$ cd /var/www
$ git clone https://github.com/jbrooksuk/Cachet.git
$ cd Cachet
$ composer install
```

# Deploy to Heroku

When using the **Deploy to Heroku** button you needn't worry about using a database as the install will setup a free instance of ClearDB. Once installed Heroku can direct you to the setup page where you'll configure the site/application information and create an administrator account.

# Configuring a database

Cachet relies on a database to store the components and incidents, but by default the configuration is left with SQLite. This is great if you're not pushing the repository to Heroku, Dokku or other virtual containers as the information will be lost each time you push.

There is no administration panel for adding issues, so be sure to pick a database driver which you can manage the database with.

Laravel 4 uses a neat configuration setup. To change our database we need to open up `./app/config/database.php`.

By default we'll see this:

```php
'default' => 'sqlite',
'connections' => array(
	'sqlite' => array(
		'driver'   => 'sqlite',
		'database' => __DIR__.'/../database/production.sqlite',
		'prefix'   => '',
	),
	'mysql' => array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'database',
		'username'  => 'root',
		'password'  => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	),
	'pgsql' => array(
		'driver'   => 'pgsql',
		'host'     => 'localhost',
		'database' => 'database',
		'username' => 'root',
		'password' => '',
		'charset'  => 'utf8',
		'prefix'   => '',
		'schema'   => 'public',
	),
	'sqlsrv' => array(
		'driver'   => 'sqlsrv',
		'host'     => 'localhost',
		'database' => 'database',
		'username' => 'root',
		'password' => '',
		'prefix'   => '',
	),
)
```

Laravel uses PDO for its database driver so it should be compatible with:

- SQLite
- MySQL
- Postgresql
- MSSQL

However Cachet is untested with only SQLite and MySQL.

All we're doing in this file is changing the connection properties of whichever database engine we want to use. For example, if we want to use MySQL, then we'd do this:

```php
'mysql' => array(
	'driver'    => 'mysql',
	'host'      => 'db.domain.com',
	'database'  => 'cachet',
	'username'  => 'user',
	'password'  => 'password',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
),
```

Then we change the `default` value above to use the `mysql` index (which could be renamed if you wanted to) we've just changed:

```php
'default' => 'mysql'
```

### Running database migrations

Once we've decided on our database, we now need to run the migrations to create the tables. Again, by default Cachet uses SQLite and the database file can be found at `./app/database/production.sqlite`, however we will first need to create the file:

```bash
$ touch ./app/database/production.sqlite
```

If you've renamed the database above, then be sure to mimic the change here too.

In our command line we need to run the migrations, from within the root directory:

```bash
$ php artisan migrate
```

You should should see the following output:

```bash
$ php artisan migrate
Migration table created successfully.
Migrated: 2014_11_16_224719_CreateIncidentsTable
Migrated: 2014_11_16_224937_CreateComponentsTable
Migrated: 2014_11_17_144232_CreateSettingsTable
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

**TODO.**

# Environment Detection

If you're deploying into production you'll want to create an environmental variable as `ENV=production`. In the instance where the variable isn't defined, Cachet will think that it's `local`.

# Security

After deploying to a server that isn't [Heroku](#heroku) you should run `php artisan key:generate` before setting Cachet up. This changes the application key (found in `/app/config/app.php`) which is used for encryption.
