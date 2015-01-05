<?php

namespace CachetHQ\Cachet\Http\Controllers;

use CachetHQ\Cachet\Models\Setting;
use CachetHQ\Cachet\Models\User;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SetupController extends Controller
{
    /**
     * Create a new setup controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->beforeFilter('csrf', ['only' => ['postCachet']]);
    }

    /**
     * Returns the setup page.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return View::make('setup')->with([
            'pageTitle' => trans('setup.setup'),
        ]);
    }

    /**
     * Handles the actual app setup.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postIndex()
    {
        $postData = Binput::all();

        $v = Validator::make($postData, [
            'settings.app_name'     => 'required',
            'settings.app_domain'   => 'required',
            'settings.show_support' => 'boolean',
            'user.username'         => 'alpha_dash|required',
            'user.email'            => 'email|required',
            'user.password'         => 'required'
        ]);

        if ($v->passes()) {
            // Pull the user details out.
            $userDetails = array_pull($postData, 'user');

            // TODO: Do we want to just use Model::unguard() here?
            $user = User::create([
                'username' => $userDetails['username'],
                'email'    => $userDetails['email'],
                'password' => $userDetails['password'],
                'level'    => 1,
            ]);

            Auth::login($user);

            $settings = array_get($postData, 'settings');

            foreach ($settings as $settingName => $settingValue) {
                Setting::create([
                    'name'  => $settingName,
                    'value' => $settingValue,
                ]);
            }

            return Redirect::to('dashboard');
        } else {
            // No good, let's try that again.
            return Redirect::back()->withInput()->with('errors', $v->messages());
        }
    }
}
