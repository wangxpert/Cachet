<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Middleware;

use CachetHQ\Cachet\Facades\Setting;
use Closure;
use Exception;
use Illuminate\Support\Facades\Redirect;

class HasSetting
{
    /**
     * Run the has setting middleware.
     *
     * We're verifying that the given setting exists in our database. If it
     * doesn't, then we're sending the user to the setup page so that they can
     * complete the installation of Cachet on their server.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $settingName = $this->getSettingName($request);

        try {
            if (!Setting::get($settingName)) {
                return Redirect::to('setup');
            }
        } catch (Exception $e) {
            return Redirect::to('setup');
        }

        return $next($request);
    }

    /**
     * Get the setting from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    private function getSettingName($request)
    {
        $actions = $request->route()->getAction();

        return $actions['setting'];
    }
}
