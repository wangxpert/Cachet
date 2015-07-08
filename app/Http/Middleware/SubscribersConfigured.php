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

use Closure;
use Illuminate\Support\Facades\Redirect;

class SubscribersConfigured
{
    /**
     * We're verifying that subscribers is both enabled and configured.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!subscribers_enabled()) {
            return Redirect::route('status-page');
        }

        return $next($request);
    }
}
