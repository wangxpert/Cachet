@extends('layout.dashboard')

@section('content')
    <div class="header fixed">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="icon ion-stats-bars"></i> {{ trans('dashboard.metrics.metrics') }}
        </span>
        <a class="btn btn-sm btn-success pull-right" href="{{ route('dashboard.metrics.add') }}">
            {{ trans('dashboard.metrics.add.title') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="content-wrapper header-fixed">
        <div class="row">
            <div class="col-sm-12">
                @include('partials.dashboard.errors')
                <div class="striped-list">
                    @foreach($metrics as $metric)
                    <div class="row striped-list-item">
                        <div class="col-md-6">
                            <i class="{{ $metric->icon }}"></i> <strong>{{ $metric->name }}</strong>
                            @if($metric->description)
                            <p><small>{{ Str::words($metric->description, 5) }}</small></p>
                            @endif
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="/dashboard/metrics/{{ $metric->id }}/edit" class="btn btn-default">{{ trans('forms.edit') }}</a>
                            <a href="/dashboard/metrics/{{ $metric->id }}/delete" class="btn btn-danger confirm-action" data-method='DELETE'>{{ trans('forms.delete') }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
