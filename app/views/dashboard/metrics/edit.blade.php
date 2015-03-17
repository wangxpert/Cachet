@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="icon icon ion-android-alert"></i> {{ trans('dashboard.metrics.metrics') }}
        </span>
        > <small>{{ trans('dashboard.metrics.edit.title') }}</small>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                @include('partials.dashboard.errors')
                <form class='form-vertical' name='MetricsForm' role='form' method='POST'>
                    {{ Form::token() }}
                    <fieldset>
                        <div class="form-group">
                            <label for="metric-name">{{ trans('forms.metrics.name') }}</label>
                            <input type="text" class="form-control" name="metric[name]" id="metric-name" required value={{ $metric->name }}>
                        </div>
                        <div class="form-group">
                            <label for="metric-suffix">{{ trans('forms.metrics.suffix') }}</label>
                            <input type="text" class="form-control" name="metric[suffix]" id="metric-suffix" required value="{{ $metric->suffix }}">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.metrics.description') }}</label>
                            <div class='markdown-control'>
                                <textarea name="metric[description]" class="form-control" rows="5" required>{{ $metric->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.metrics.calc_type') }}</label>
                            <select name="metric[calc_type]" class="form-control" required>
                                <option value="0" {{ $metric->calc_type === 0 ? "selected" : null }}>{{ trans('forms.metrics.type_sum') }}</option>
                                <option value="1" {{ $metric->calc_type === 1 ? "selected" : null }}>{{ trans('forms.metrics.type_avg') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="metric-default_value">{{ trans('forms.metrics.default-value') }}</label>
                            <input type="number" class="form-control" name="metric[default_value]" id="metric-default_value" value="{{ $metric->default_value }}">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.metrics.display-chart') }}</label>
                            <input type="hidden" value="0" name="metric[display_chart]">
                            <input type="checkbox" value="1" name="metric[display_chart]" class="form-control" {{ $metric->display_chart ? 'checked' : null }}>
                        </div>
                    </fieldset>

                    <input type="hidden" name="metric[id]" value={{$metric->id}}>

                    <div class='form-group'>
                        <div class='btn-group'>
                            <button type="submit" class="btn btn-success">{{ trans('forms.update') }}</button>
                            <a class="btn btn-default" href="{{ route('dashboard.metrics') }}">{{ trans('forms.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
