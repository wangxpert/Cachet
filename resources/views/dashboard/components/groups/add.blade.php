@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="icons ion-ios-keypad"></i> {{ trans_choice('dashboard.components.groups.groups', 2) }}
        </span>
        &gt; <small>{{ trans('dashboard.components.groups.add.title') }}</small>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                @include('dashboard.partials.errors')
                <form name="CreateComponentGroupForm" class="form-vertical" role="form" action="/dashboard/components/groups/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="form-group">
                            <label>{{ trans('forms.components.groups.name') }}</label>
                            <input type="text" class="form-control" name="name" id="group-name" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="hidden" value="0" name="collapsed">
                                <input type="checkbox" value="1" name="collapsed">
                                {{ trans('forms.components.groups.collapsed') }}
                            </label>
                        </div>
                    </fieldset>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">{{ trans('forms.add') }}</button>
                        <a class="btn btn-default" href="{{ route('dashboard.components.groups') }}">{{ trans('forms.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
