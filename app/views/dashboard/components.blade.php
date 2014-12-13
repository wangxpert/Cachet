@extends('layout.dashboard')

@section('content')
	<div class="header">
		<i class="fa fa-list-ul"></i> {{ Lang::get('cachet.dashboard.components') }}
		<input type="text" class="form-control input-sm pull-right" placeholder="{{ Lang::get('cachet.dashboard.search') }}">
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div role='tabpanel'>
				<ul class="nav nav-tabs" role='tablist'>
					<li role='presentation' class='active'><a data-toggle='tab' role='tab' href="#active">Active Components</a></li>
				</ul>
				<div class="tab-content">
					<div role='tabpanel' class='tab-pane active' id="active">
						<div class='row'>
							<div class='col-md-6'>
								<h3>Components</h3>
							</div>
							<div class='col-md-6 text-right'>
								<a href='javascript: void(0);' class='btn btn-primary'>Add Component</a>
							</div>
						</div>
						<div class='row'>
							<ul class='list-group'>
								@foreach($components as $component)
								<li class='list-group-item'>
									<div class='row'>
										<div class='col-md-6'>
											<strong>{{ $component->name }}</strong>
										</div>
										<div class='col-md-6'>
											<ul class='nav nav-pills'>
												<li role='presentation'><a href='javascript: void(0);'>Edit</a></li>
												<li role='presentation'><a href='javascript: void(0);'>Delete</a></li>
											</ul>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
