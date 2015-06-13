<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers\Admin;

use CachetHQ\Cachet\Http\Controllers\AbstractController;
use CachetHQ\Cachet\Models\Component;
use Illuminate\Support\Facades\View;

class DashboardController extends AbstractController
{
    /**
     * Shows the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function showDashboard()
    {
        $components = Component::orderBy('order')->get();

        segment_page('Dashboard');

        return View::make('dashboard.index')->with([
            'components' => $components,
        ]);
    }

    /**
     * Shows the notifications view.
     *
     * @return \Illuminate\View\View
     */
    public function showNotifications()
    {
        return View::make('dashboard.notifications.index')->with([
            'pageTitle' => trans('dashboard.notifications.notifications').' '.trans('dashboard.dashboard'),
        ]);
    }
}
