@extends('layout.dashboard')

@section('content')
    <div class='content-panel'>
        @if(isset($subMenu))
        @include('partials.dashboard.sub-sidebar')
        @endif
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <form name='SettingsForm' class='form-vertical' role='form' action='/dashboard/settings' method='POST'>
                        <h4 class="sub-header" id='stylesheet'>{{ trans('dashboard.settings.stylesheet.stylesheet') }}</h4>

                        @if($saved = Session::get('saved'))
                        <div class='alert alert-success'><strong>{{ trans('dashboard.settings.edit.success') }}</strong></div>
                        @elseif(Session::has('saved'))
                        <div class='alert alert-danger'><strong>{{ trans('dashboard.settings.edit.failure') }}</strong></div>
                        @endif

                        <fieldset>
                            <div class='row'>
                                <div class='col-xs-12'>
                                    <div class='form-group'>
                                        <label>{{ trans('forms.settings.stylesheet.custom-css') }}</label>
                                        <textarea class='form-control' name='stylesheet' rows='10'>{{ Setting::get('stylesheet') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class='row'>
                            <div class='col-xs-12'>
                                <div class='form-group'>
                                    <button type="submit" class="btn btn-success">{{ trans('forms.save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
