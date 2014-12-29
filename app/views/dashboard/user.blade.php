@extends('layout.dashboard')

@section('content')
    <div class="header">
        <span class='uppercase'>
            <i class="fa fa-user"></i> {{ Lang::get('cachet.dashboard.user') }}
        </span>
    </div>
    <div class='content-wrapper'>
        <div class="row">
            <div class="col-sm-12">
                @if($updated = Session::get('updated'))
                <div class='alert alert-{{ $updated ? "success" : "danger" }}'>
                    @if($updated)
                    <strong>Awesome.</strong> Profile updated.
                    @else
                    <strong>Whoops.</strong> Something went wrong when updating.
                    @endif
                </div>
                @endif

                <form name='UserForm' class='form-vertical' role='form' action='/dashboard/user' method='POST'>
                    <fieldset>
                        <div class='form-group'>
                            <label>Username</label>
                            <input type='text' class='form-control' name='username' value='{{ Auth::user()->username }}' required />
                        </div>
                        <div class='form-group'>
                            <label>Email Address</label>
                            <input type='email' class='form-control' name='email' value='{{ Auth::user()->email }}' required />
                        </div>
                        <div class='form-group'>
                            <label>Password</label>
                            <input type='password' class='form-control' name='password' value='' />
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-success">Update profile</button>
                </form>
            </div>
        </div>
    </div>
@stop
