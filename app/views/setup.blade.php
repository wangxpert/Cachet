@extends('layout.dashboard')

@section('content')
    <div class="header">
        <span class="uppercase">
            <i class='ion-gear-a'></i> {{ trans('setup.title') }}
        </span>
    </div>
    <div class="content-wrapper">
        <div class='row'>
            <div class='col-sm-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>{{ trans('setup.service_details') }}</div>
                    <div class='panel-body'>
                        {{ Form::open(['name' => 'SetupForm', 'class' => 'form-vertical', 'role' => 'form']) }}
                            <fieldset>
                                <legend>{{ trans('setup.status_page_setup') }}</legend>
                                <div class='form-group'>
                                    <label class='sr-only'>{{ trans('forms.site_name') }}</label>
                                    <input type='text' name='settings[app_name]' class='form-control' placeholder='{{ trans("forms.setup.site_name") }}' value='{{ Input::old("settings.app_name", "") }}' required />
                                    @if($errors->has('settings.app_name'))
                                    <span class='text-danger'>{{ $errors->first('settings.app_name') }}</span>
                                    @endif
                                </div>
                                <div class='form-group'>
                                    <label class='sr-only'>{{ trans('forms.site_domain') }}</label>
                                    <input type='text' name='settings[app_domain]' class='form-control' placeholder='{{ trans("forms.setup.site_domain") }}' value='{{ Input::old("settings.app_domain", "") }}' required />
                                    @if($errors->has('settings.app_domain'))
                                    <span class='text-danger'>{{ $errors->first('settings.app_domain') }}</span>
                                    @endif
                                </div>
                                <div class='form-group'>
                                    <label>
                                        <input type='checkbox' name='settings[show_support]' value='1' checked />
                                        {{ trans("setup.show_support") }}
                                    </label>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>{{ trans("setup.admin_account") }}</legend>
                                <div class='form-group'>
                                    <label class='sr-only'>{{ trans("forms.username") }}</label>
                                    <input type='text' name='user[username]' class='form-control' placeholder='{{ trans("forms.setup.username") }}' value='{{ Input::old("user.username", "") }}' required />
                                    @if($errors->has('user.username'))
                                    <span class='text-danger'>{{ $errors->first('user.username') }}</span>
                                    @endif
                                </div>
                                <div class='form-group'>
                                    <label class='sr-only'>{{ trans("forms.email") }}</label>
                                    <input type='email' name='user[email]' class='form-control' placeholder='{{ trans("forms.setup.email") }}' value='{{ Input::old("user.email", "") }}' required />
                                    @if($errors->has('user.email'))
                                    <span class='text-danger'>{{ $errors->first('user.email') }}</span>
                                    @endif
                                </div>
                                <div class='form-group'>
                                    <label class='sr-only'>{{ trans("forms.password") }}</label>
                                    <input type='password' name='user[password]' class='form-control' placeholder='{{ trans("forms.setup.password") }}' value='{{ Input::old("user.password", "") }}' required />
                                    @if($errors->has('user.password'))
                                    <span class='text-danger'>{{ $errors->first('user.password') }}</span>
                                    @endif
                                </div>
                            </fieldset>

                            <hr />
                            <div class='form-group'>
                                <input type='hidden' name='settings[app_incident_days]' value='7' />
                                <button type='submit' class='btn btn-success'>{{ trans("setup.complete_setup") }}</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
