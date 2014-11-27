<?php

namespace CachetHQ\Cachet\Controllers;

class HomeController extends Controller {
    /**
     * Returns the rendered Blade templates.
     * @return View
     */
    public function showIndex() {
        return View::make('index', ['components' => Component::all()]);
    }
}