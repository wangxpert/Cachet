@extends('layout.dashboard')

@section('content')
	<div class="header">
		<i class="ion ion-stats-bars"></i> {{ Lang::get('cachet.dashboard.metrics') }}
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h3>Metrics</h3>
			<p class='lead'>Eventually this page will show all of the graphs that make up your metrics.</p>
		</div>
	</div>
@stop
