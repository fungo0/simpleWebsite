@extends('layouts.dashboard')
@section('page_heading','Search result')

@section('content')

<div class="courses_box1">
    <div class="container">
    	@if (Auth::user()->hasRole('Admin'))
    		<a href="{{ url('/result') }}" class="btn btn-default pull-right">Search in post</a><br>
    	@endif
    	
		@foreach ($users as $user)
			<div class="col-lg-10">
				<h3>{{ $user->user->name }}</h3>
				<p>{{ $user->user->email }}</p>
				<br><hr>
			</div>
			<div class="col-lg-1">
				<a href="{{ route('users.edit', $user->id ) }}"><i class="fa fa-pencil-square-o fa-4x"></i></a>
			</div>
		@endforeach
	</div>
</div>

@endsection