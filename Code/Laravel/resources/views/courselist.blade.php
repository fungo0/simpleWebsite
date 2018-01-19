@extends('includes.header')

@section('content')
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
  		<h3>Courses</h3>
  		<p class="description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ url('/') }}">Home</a></li>
                <li class="current-page">Courseslist</li>
            </ul>
        </div>
  	</div>
</div>
<!-- //banner -->
<div class="courses_box1">
   	<div class="container">
   	  	<div class="col-md-3">@include('includes.leftcoursebox')</div>
		<div class="col-md-9">
            @if (!empty($failed))
                <div class="alert alert-danger">
                    <h2><center>{{ $failed }}</center></h2>
                </div>
            @endif
			<div class="course_list">
                <div class="table-header clearfix">
                    <div class="id_col">ID</div>
                    <div class="name_col"  style="width: 250px">Course Name (Lv.)</div>
                    <div class="duration_col">Duration</div>
                    <div class="date_col" style="width: 160px">Location</div>
					@if (!Auth::guest())
						<div>Action</div>
					@endif
                </div>
                <ul class="table-list">
                    @foreach ($queries as $query)
                        <li class="clearfix">
                            <div class="id_col">{{ $query->id }}</div>
                            <div class="name_col" style="width: 250px">{{ $query->name }} (Lv. {{ $query->level }})</div>
                            <div class="duration_col">{{ $query->duration }} Hrs</div>
                            <div class="date_col">
                                {{ $query->location }}
                            </div>
							@if (!Auth::guest())
				                @if (Auth::user()->hasRole('User'))
				                    <div>
				                        <a href="/courseregister/{{ $query->id }}"><button class="btn btn-danger">Register</button></a>
				                    </div>
				                @endif
								@can('Delete Course')
									{!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $query->id] ]) !!}
	                        		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	                        		{!! Form::close() !!}
	                        	@endcan
							@endif
                        </li>
                    @endforeach
                </ul>
            </div>
	    </div>
	    <div class="clearfix"> </div>
   	</div>
</div>
@endsection
