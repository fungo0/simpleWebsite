@extends('layouts.dashboard')

@section('page_heading','Notifications')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			@section ('cotable_panel_title','Post Deleted')
			@section ('cotable_panel_body')
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>User</th>
						<th>Post ID (Content)</th>
						<th>Deleted Time</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($notifications as $notification)
						<tr class="warning">
							<td>{{ $notification->data['PersonInCharge']['name'] }}</td>
							<td>{{ $notification->data['Data']['id'] }}  ({{ str_limit($notification->data['Data']['body'], 25) }}......)</td>
							<td>{{ $notification->data['Time']['date'] }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@endsection
			<form method="GET" action="{{ url('/read') }}">
				<button type="submit" class="btn btn-info btn-circle btn-lg" style="float: right; margin: 10px 20px 5px 0px;"><i class="fa fa-check"></i></button>
			</form>
			@include('widgets.panel', array('header'=>true, 'as'=>'cotable')) 
		</div>
	</div>


@endsection