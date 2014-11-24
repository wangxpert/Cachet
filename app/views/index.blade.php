@extends('layout.master')

@section('content')
	<div class='alert alert-{{ $systemStatus }}'>{{ $systemMessage }}</div>

	<div class='page-header'>
		<ul class='list-group components'>
			@foreach(Component::get() as $component)
			<li class='list-group-item component '>
				<h4>{{ $component->name }} <small class='{{ $component->color }}'>{{ $component->humanStatus }}</small></h4>
				<p>{{ $component->description }}</p>
			</li>
			@endforeach
		</ul>
	</div>

	@for($i=0; $i <= 7; $i++)
	@include('incident', array('i', $i))
	@endfor

	@if(Setting::get('show_support'))
	<hr />
	<div class='footer'>
		<p>{{ Setting::get('app_name') }} Status Page is powered by <a href='https://github.com/jbrooksuk/Cachet'>Cachet</a>.</p>
	</div>
	@endif
@stop
