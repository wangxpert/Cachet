@extends('layout.dashboard')

@section('content')
	<div class="header">
		<i class="fa fa-exclamation-triangle"></i> {{ Lang::get('cachet.dashboard.incidents') }}
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h3>Incidents</h3>

			@if ($incidents->count() === 0)
			<p class='lead'>Woah! No incidents, your doing well!</p>
			@else
			<p class='lead'>You have <strong>{{ $incidents->count() }}</strong> incidents.</p>
			@endif
		</div>
	</div>
@stop
