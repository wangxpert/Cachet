{!! trans('cachet.subscriber.email.component.text', ['component_name' => $component_name, 'component_human_status' => $component_human_status, 'app_name' => $app_name]) !!}

{!! trans('cachet.subscriber.email.manage') !!} {{ $manage_link }}

@if($show_support)
{!! trans('cachet.powered_by', ['app' => $app_name]) !!}
@endif
