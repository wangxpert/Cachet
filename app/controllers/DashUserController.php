<?php

class DashUserController extends Controller
{
    /**
     * Shows the user view.
     * @return \Illuminate\View\View
     */
    public function showUser()
    {
        return View::make('dashboard.user')->with([
            'pageTitle' => 'User - Dashboard',
        ]);
    }

    /**
     * Updates the statsu page user.
     * @return \Illuminate\View\View
     */
    public function postUser()
    {
        $items = Input::all();

        $updated = Auth::user()->update($items);

        return Redirect::back()->with('updated', $updated);
    }
}
