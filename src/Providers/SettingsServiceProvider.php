<?php

namespace CachetHQ\Cachet\Providers;

use CachetHQ\Cachet\Models\Setting as SettingModel;
use CachetHQ\Cachet\Services\SettingsService;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('setting', function ($app) {
            return new SettingsService(new SettingModel());
        });
    }
}
