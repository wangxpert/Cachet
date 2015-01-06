@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="icon ion-plus"></i> {{ trans('dashboard.incidents.incidents') }}
        </span>
        > <small>{{ trans('dashboard.incidents.templates.add.title') }}</small>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                @if($template = Session::get('template'))
                <div class="alert alert-{{ $template->isValid() ? 'success' : 'danger' }}">
                    @if($template->isValid())
                        {{ sprintf("<strong>%s</strong> %s", trans('dashboard.notifications.awesome'), trans('dashboard.incidents.templates.add.success')) }}
                    @else
                        {{ sprintf("<strong>%s</strong> %s", trans('dashboard.notifications.whoops'), trans('dashboard.incidents.templates.add.failure').' '.$template->getErrors()) }}
                    @endif
                </div>
                @endif

                {{ Form::open(['name' => 'IncidentTemplateForm', 'class' => 'form-vertical', 'role' => 'form']) }}
                    <fieldset>
                        <div class="form-group">
                            <label for="template-name">{{ trans('forms.incidents.templates.name') }}</label>
                            <input type="text" class="form-control" name="template[name]" id="template-name" required />
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.incidents.templates.template') }}</label>
                            <textarea name="template[template]" class="form-control" rows="5" required></textarea>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-success">{{ trans('forms.create') }}</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
