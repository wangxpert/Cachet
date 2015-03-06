@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="icon ion-android-alert"></i> {{ trans('dashboard.incidents.incidents') }}
        </span>
        &gt; <small>{{ trans('dashboard.incidents.add.title') }}</small>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                @include('partials.dashboard.errors')
                <form class="form-vertical" name="IncidentForm" role="form" method="POST" autocomplete="off">
                    {{ Form::token() }}
                    <fieldset>
                        @if($incidentTemplates->count() > 0)
                        <div class="form-group">
                            <label for="incident-template">{{ trans('forms.incidents.templates.template') }}</label>
                            <select class="form-control" name="template">
                                <option selected></option>
                                @foreach($incidentTemplates as $tpl)
                                <option value="{{ $tpl->slug }}">{{ $tpl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="incident-name">{{ trans('forms.incidents.name') }}</label>
                            <input type="text" class="form-control" name="incident[name]" id="incident-name" required value="{{ Input::old('incident.name') }}">
                        </div>
                        <div class="form-group">
                            <label for="incident-name">{{ trans('forms.incidents.status') }}</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="incident[status]" value="1">
                                <i class="icon ion-flag"></i>
                                {{ trans('cachet.incidents.status')[1] }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="incident[status]" value="2">
                                <i class="icon ion-alert-circled"></i>
                                {{ trans('cachet.incidents.status')[2] }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="incident[status]" value="3">
                                <i class="icon ion-eye"></i>
                                {{ trans('cachet.incidents.status')[3] }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="incident[status]" value="4">
                                <i class="icon ion-checkmark"></i>
                                {{ trans('cachet.incidents.status')[4] }}
                            </label>
                        </div>
                        @if($components->count() > 0)
                        <div class="form-group">
                            <label>{{ trans('forms.incidents.component') }}</label>
                            <select name='incident[component_id]' class='form-control'>
                                <option value='0' selected></option>
                                @foreach($components as $component)
                                <option value='{{ $component->id }}'>{{ $component->name }}</option>
                                @endforeach
                            </select>
                            <span class='help-block'>{{ trans('forms.optional') }}</span>
                        </div>
                        @endif
                        <div class="form-group hidden" id='component-status'>
                            <div class="well">
                                <div class="radio-items">
                                    @foreach(trans('cachet.components.status') as $statusID => $status)
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="incident[component_status]" value="{{ $statusID }}" >
                                            {{ $status }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.incidents.message') }}</label>
                            <div class='markdown-control'>
                                <textarea name="incident[message]" class="form-control" rows="5" required>{{ Input::old('incident.message') }}</textarea>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success">{{ trans('forms.add') }}</button>
                            <a class="btn btn-default" href="{{ route('dashboard.incidents') }}">{{ trans('forms.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
