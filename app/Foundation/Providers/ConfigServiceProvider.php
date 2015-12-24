<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Foundation\Providers;

use CachetHQ\Cachet\Config\Repository;
use CachetHQ\Cachet\Facades\Setting;
use CachetHQ\Cachet\Models\Setting as SettingModel;
use Exception;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $appDomain = $appLocale = $appTimezone = null;

        try {
            // Get app custom configuration.
            $appDomain = Setting::get('app_domain');
            $appLocale = Setting::get('app_locale');
            $appTimezone = Setting::get('app_timezone');

            // Setup Cors.
            $allowedOrigins = $this->app->config->get('cors.defaults.allowedOrigins');
            $allowedOrigins[] = Setting::get('app_domain');

            // Add our allowed domains too.
            if ($allowedDomains = Setting::get('allowed_domains')) {
                $domains = explode(',', $allowedDomains);
                foreach ($domains as $domain) {
                    $allowedOrigins[] = $domain;
                }
            } else {
                $allowedOrigins[] = $this->app->config->get('app.url');
            }

            $this->app->config->set('cors.paths.api/v1/*.allowedOrigins', $allowedOrigins);
        } catch (Exception $e) {
            // Don't throw any errors, we may not be setup yet.
        }

        // Override default app values.
        $this->app->config->set('app.url', $appDomain ?: $this->app->config->get('app.url'));
        $this->app->config->set('app.locale', $appLocale ?: $this->app->config->get('app.locale'));
        $this->app->config->set('cachet.timezone', $appTimezone ?: $this->app->config->get('cachet.timezone'));

        // Set custom lang.
        $this->app->translator->setLocale($appLocale);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('setting', function () {
            return new Repository(new SettingModel());
        });

        $this->app->alias('setting', Repository::class);
    }
}
