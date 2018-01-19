@extends('layouts.dashboard')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			@section ('cotable_panel_title','Unauthorized Access')
			@section ('cotable_panel_body')
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>User ID</th>
						<th>IP Address</th>
						<th>Date Time</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($blacklists as $blacklist)
						<tr class="warning">
							<td>
								@if (!empty($blacklist->user_id))
									{{ $blacklist->user_id }}
								@else 
									Guest
								@endif
							</td>
							<td>{{ $blacklist->ip_address }}</td>
							<td>{{ $blacklist->created_at }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>	
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
		</div>
	</div>
@endsection