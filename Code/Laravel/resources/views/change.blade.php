@extends('includes.header')
    
@section('content')
    <div class="container">
        <div class="row">
        	<div class="col-sm-12">
				@section ('cotable_panel_title','Schedule')
				@section ('cotable_panel_body')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name (Old)</th>
							<th>Duration (Old)</th>
							<th>Level (Old)</th>
							<th>Location (Old)</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($oldcontents as $oldcontent)
							<tr class="info">
								<td>{{ $oldcontent->name }}</td>
								<td>{{ $oldcontent->duration }}</td>
								<td>{{ $oldcontent->level }}</td>
								<td>{{ $oldcontent->location }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<h2><center>Old Schedule => New Schedule</center></h2>
				<br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name (New)</th>
							<th>Duration (New)</th>
							<th>Level (New)</th>
							<th>Location (New)</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($notifications as $notification)
							<tr class="info">
								<td>{{ $notification->data['Data']['name'] }}</td>
								<td>{{ $notification->data['Data']['duration'] }}</td>
								<td>{{ $notification->data['Data']['level'] }}</td>
								<td>{{ $notification->data['Data']['location'] }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				@endsection
				@if (Session::get('notifications') > 0)
					<form method="GET" action="{{ url('/known') }}">
						<button type="submit" class="btn btn-info btn-circle btn-lg" style="float: right; margin: 10px 20px 5px 0px;"><i class="fa fa-check"></i></button>
					</form>
					@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
				@else
					<div class="title"><h1><center>No Amendment.</center></h1></div>
				@endif
			</div>
        </div>
    </div>
@endsection