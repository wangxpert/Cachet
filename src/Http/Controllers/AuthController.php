<?php

namespace CachetHQ\Cachet\Http\Controllers;

use GrahamCampbell\Throttle\Facades\Throttle;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

/**
 * Logs users into their account.
 */
class AuthController extends Controller
{
    /**
     * Shows the login view.
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return View::make('auth.login');
    }

    /**
     * Logs the user in.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        if (Auth::attempt(Binput::only(['email', 'password']))) {
            return Redirect::intended('dashboard');
        }

        Throttle::hit(Request::instance(), 10, 10);

        return Redirect::back()
            ->withInput(Binput::except('password'))
            ->with('error', 'Invalid email or password');
    }

    /**
     * Logs the user out, deleting their session etc.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAction()
    {
        Auth::logout();

        return Redirect::to('/');
    }
}
