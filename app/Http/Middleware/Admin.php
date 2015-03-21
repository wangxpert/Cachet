<?php

namespace CachetHQ\Cachet\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Response;

class Admin
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Run the cors middleware.
     *
     * We're verifying that the current user is logged in to Cachet and is an admin level.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->auth->check() || ($this->auth->check() && !$this->auth->user()->isAdmin)) {
            return Response::view('errors.401', [
                'pageTitle' => trans('errors.unauthorized.title'),
            ], 401);
        }

        return $next($request);
    }
}
