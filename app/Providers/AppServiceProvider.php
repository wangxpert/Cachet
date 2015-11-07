<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Providers;

use CachetHQ\Cachet\Dates\DateFactory;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @param \Illuminate\Bus\Dispatcher $dispatcher
     */
    public function boot(Dispatcher $dispatcher)
    {
        $dispatcher->mapUsing(function ($command) {
            return Dispatcher::simpleMapping($command, 'CachetHQ\Cachet', 'CachetHQ\Cachet\Handlers');
        });

        Str::macro('canonicalize', function ($url) {
            return preg_replace('/([^\/])$/', '$1/', $url);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDateFactory();
    }

    /**
     * Register the date factory.
     *
     * @return void
     */
    protected function registerDateFactory()
    {
        $this->app->singleton(DateFactory::class, function ($app) {
            $appTimezone = $app->config->get('app.timezone');
            $cacheTimezone = $app->config->get('cachet.timezone');

            return new DateFactory($appTimezone, $cacheTimezone);
        });
    }
}
