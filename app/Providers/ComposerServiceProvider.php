<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Providers;

use CachetHQ\Cachet\Composers\AppComposer;
use CachetHQ\Cachet\Composers\DashboardComposer;
use CachetHQ\Cachet\Composers\IndexComposer;
use CachetHQ\Cachet\Composers\LoggedUserComposer;
use CachetHQ\Cachet\Composers\ThemeComposer;
use CachetHQ\Cachet\Composers\TimezoneLocaleComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @param \Illuminate\Contracts\View\Factory $factory
     */
    public function boot(Factory $factory)
    {
        $factory->composer('*', AppComposer::class);
        $factory->composer('*', LoggedUserComposer::class);
        $factory->composer(['index', 'subscribe'], IndexComposer::class);
        $factory->composer(['index', 'subscribe'], ThemeComposer::class);
        $factory->composer('dashboard.*', DashboardComposer::class);
        $factory->composer(['setup', 'dashboard.settings.app-setup'], TimezoneLocaleComposer::class);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
