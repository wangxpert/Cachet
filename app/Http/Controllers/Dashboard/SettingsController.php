<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers\Dashboard;

use CachetHQ\Cachet\Models\Setting;
use CachetHQ\Cachet\Models\User;
use Exception;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
    protected $subMenu = [];
    protected $subTitle = 'Settings';

    public function __construct()
    {
        $this->subMenu = [
            'setup' => [
                'title'  => trans('dashboard.settings.app-setup.app-setup'),
                'url'    => '/dashboard/settings/setup',
                'icon'   => 'ion-gear-b',
                'active' => false,
            ],
            'security' => [
                'title'  => trans('dashboard.settings.security.security'),
                'url'    => '/dashboard/settings/security',
                'icon'   => 'ion-lock-combination',
                'active' => false,
            ],
            'theme' => [
                'title'  => trans('dashboard.settings.theme.theme'),
                'url'    => '/dashboard/settings/theme',
                'icon'   => 'ion-paintbrush',
                'active' => false,
            ],
            'stylesheet' => [
                'title'  => trans('dashboard.settings.stylesheet.stylesheet'),
                'url'    => '/dashboard/settings/stylesheet',
                'icon'   => 'ion-paintbucket',
                'active' => false,
            ],
        ];

        View::share('sub_title', $this->subTitle);

        View::share('sub_menu', $this->subMenu);
    }

    /**
     * Shows the settings setup view.
     *
     * @return \Illuminate\View\View
     */
    public function showSetupView()
    {
        $this->subMenu['setup']['active'] = true;

        return View::make('dashboard.settings.app-setup')
            ->withPageTitle('Application Setup - Dashboard')
            ->withSubMenu($this->subMenu);
    }

    /**
     * Shows the settings theme view.
     *
     * @return \Illuminate\View\View
     */
    public function showThemeView()
    {
        $this->subMenu['theme']['active'] = true;

        return View::make('dashboard.settings.theme')
            ->withPageTitle('Theme - Dashboard')
            ->withSubMenu($this->subMenu);
    }

    /**
     * Shows the settings security view.
     *
     * @return \Illuminate\View\View
     */
    public function showSecurityView()
    {
        $this->subMenu['security']['active'] = true;

        $unsecureUsers = User::whereNull('google_2fa_secret')->orWhere('google_2fa_secret', '')->get();

        return View::make('dashboard.settings.security')
            ->withPageTitle('Security - Dashboard')
            ->withSubMenu($this->subMenu)
            ->withUnsecureUsers($unsecureUsers);
    }

    /**
     * Shows the settings stylesheet view.
     *
     * @return \Illuminate\View\View
     */
    public function showStylesheetView()
    {
        $this->subMenu['stylesheet']['active'] = true;

        return View::make('dashboard.settings.stylesheet')
            ->withPageTitle('Stylesheet - Dashboard')
            ->withSubMenu($this->subMenu);
    }

    /**
     * Updates the status page settings.
     *
     * @return \Illuminate\View\View
     */
    public function postSettings()
    {
        if (Binput::get('remove_banner') === '1') {
            $setting = Setting::where('name', 'app_banner');
            $setting->delete();
        }

        if (Binput::hasFile('app_banner')) {
            $file = Binput::file('app_banner');

            // Image Validation.
            // Image size in bytes.
            $maxSize = $file->getMaxFilesize();

            if ($file->getSize() > $maxSize) {
                return Redirect::route('dashboard.settings.setup')->withErrors(trans('dashboard.settings.app-setup.too-big', ['size' => $maxSize]));
            }

            if (!$file->isValid() || $file->getError()) {
                return Redirect::route('dashboard.settings.setup')->withErrors($file->getErrorMessage());
            }

            if (strpos($file->getMimeType(), 'image/') !== 0) {
                return Redirect::route('dashboard.settings.setup')->withErrors(trans('dashboard.settings.app-setup.images-only'));
            }

            // Store the banner.
            Setting::firstOrCreate(['name' => 'app_banner'])->update(['value' => base64_encode(file_get_contents($file->getRealPath()))]);

            // Store the banner type
            Setting::firstOrCreate(['name' => 'app_banner_type'])->update(['value' => $file->getMimeType()]);
        }

        try {
            foreach (Binput::except(['app_banner', 'remove_banner']) as $settingName => $settingValue) {
                if ($settingName === 'app_analytics_pi_url') {
                    $settingValue = rtrim($settingValue, '/');
                }

                Setting::firstOrCreate(['name' => $settingName])->update(['value' => $settingValue]);
            }
        } catch (Exception $e) {
            return Redirect::route('dashboard.settings.setup')->withErrors(trans('dashboard.settings.edit.failure'));
        }

        Lang::setLocale(Binput::get('app_locale'));

        return Redirect::route('dashboard.settings.setup')
            ->withSuccess(trans('dashboard.settings.edit.success'));
    }
}
