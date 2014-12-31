@extends('layout.dashboard')

@section('content')
    @if(isset($subMenu))
    @include('partials.dashboard.sub-sidebar')
    @endif
    <div class='content-panel'>
        <div class="header">
            <span class="uppercase">
                <i class="icon ion-gear-a"></i> {{ Lang::get('cachet.dashboard.settings') }}
            </span>
        </div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <form name='SettingsForm' class='form-vertical' role='form' action='/dashboard/settings' method='POST' enctype="multipart/form-data">
                        <h4 class="sub-header" id='application-setup'>Application Setup</h4>

                        @if(($saved = Session::get('saved')))
                        <div class='alert alert-success'><strong>{{ Lang::get('cachet.dashboard.settings_saved') }}</strong></div>
                        @elseif(Session::has('error_message'))
                        <div class='alert alert-danger'><strong>{{ Session::get('error_message') }}</strong></div>
                        @endif

                        <fieldset>
                            <div class='row'>
                                <div class='col-xs-12'>
                                    <div class='form-group'>
                                        <label>Site Name</label>
                                        <input type='text' class='form-control' name='app_name' value='{{ Setting::get("app_name") }}' required />
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-xs-12'>
                                    <div class='form-group'>
                                        <label>Site URL</label>
                                        <input type='text' class='form-control' name='app_domain' value='{{ Setting::get("app_domain") }}' required />
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-xs-12'>
                                    <div class='form-group'>
                                        <label>Banner Image</label>
                                        @if($banner = Setting::get('app_banner'))
                                        <div class='well'>
                                            <img src='data:{{ Setting::get("app_banner_type") }};base64,{{ $banner }}' style='max-width: 100%' />
                                        </div>
                                        @endif
                                        <input type='file' name='app_banner' class='form-control' />
                                        <span class='help-block'>It's recommended that you upload files no bigger than 930px wide.</span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class='row'>
                            <div class='col-xs-12'>
                                <div class='form-group'>
                                    <button type="submit" class="btn btn-success">Save settings</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
