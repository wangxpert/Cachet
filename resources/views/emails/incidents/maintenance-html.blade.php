@extends('layout.emails')

@section('preheader')
{!! trans('cachet.subscriber.email.maintenance.html-preheader', ['app_name' => Setting::get('app_name')]) !!}
@stop

@section('content')
    {!! trans('cachet.subscriber.email.maintenance.html', ['app_name' => Setting::get('app_name')]) !!}

    <p>
        {!! $status !!}
    </p>

    <p>
        {!! $htmlContent !!}
    </p>

    @if(Setting::get('show_support'))
    <p>{!! trans('cachet.powered_by', ['app' => Setting::get('app_name')]) !!}</p>
    @endif
    <p>
        <small><a href="{{ $unsubscribeLink }}">{!! trans('cachet.subscriber.email.unsubscribe') !!}</a></small>
    </p>
@stop
