@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class='uppercase'>
            <i class="ion ion-person"></i> {{ trans('cachet.dashboard.user') }}
        </span>
    </div>
    <div class='content-wrapper'>
        <div class="row">
            <div class="col-sm-12">
                @if($created = Session::get('created'))
                <div class='alert alert-success'>
                    <strong>Awesome.</strong> New user has been created.
                </div>
                @elseif($errors = Session::get('errors'))
                <div class='alert alert-danger'>
                    <strong>Whoops.</strong> Something went wrong: {{ $errors }}
                </div>
                @endif

                <form name='UserForm' class='form-vertical' role='form' action='/dashboard/team/add' method='POST'>
                    <fieldset>
                        <div class='form-group'>
                            <label>Username</label>
                            <input type='text' class='form-control' name='username' value='{{ Input::old("username") }}' required />
                        </div>
                        <div class='form-group'>
                            <label>Email Address</label>
                            <input type='email' class='form-control' name='email' value='{{ Input::old("email") }}' required />
                        </div>
                        <div class='form-group'>
                            <label>Password</label>
                            <input type='password' class='form-control' name='password' value='' />
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-success">Create member</button>
                </form>
            </div>
        </div>
    </div>
@stop
