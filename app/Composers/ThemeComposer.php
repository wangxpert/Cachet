<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Composers;

use CachetHQ\Cachet\Facades\Setting;
use Illuminate\Contracts\View\View;

class ThemeComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\Contracts\View\View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->withThemeBackgroundColor(Setting::get('style_background_color'));
        $view->withThemeTextColor(Setting::get('style_text_color'));

        $viewData = $view->getData();
        $themeView = array_only($viewData, preg_grep('/^theme/', array_keys($viewData)));
        $hasThemeSettings = array_filter($themeView, function ($data) {
            return $data != null;
        });

        $view->withThemeSetup(!empty($hasThemeSettings));
    }
}
