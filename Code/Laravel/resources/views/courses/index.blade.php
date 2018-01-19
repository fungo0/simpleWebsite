@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')

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
                <li class="current-page">Courses</li>
            </ul>
        </div>
  	</div>
</div>
<!-- //banner -->
<div class="courses_box1">
   	<div class="container">
   	  	<div class="col-md-3">
			@include('includes.leftcoursebox')
		</div>
		<div class="col-md-9">
			@if (!empty($flash_message))
                <div class="alert alert-success">
                    <h2><center>{{ $flash_message }}</center></h2>
                </div>
            @endif
			<div class="course_list">
	            <div class="table-header clearfix">
	            	<div class="id_col">ID</div>
	            	<div class="name_col"  style="width: 250px">Course Name (Lv.)</div>
	                <div class="duration_col">Duration</div>
	                <div class="date_col" style="width: 160px">Location</div>
	                @can('Delete Course')
	                	<div class="duration_col">Action</div>
	                @endcan
				</div>
		        <ul class="table-list">
		        	@foreach ($courses as $course)
		        		<li class="clearfix">
							<div class="id_col">{{ $course->id }}</div>
							<div class="name_col" style="width: 250px">
								@if (!Auth::guest())
									@if (!Auth::user()->hasRole('User'))
										<a href="{{ route('courses.edit', $course->id) }}">{{ $course->name }} (Lv. {{ $course->level }})</a>
									@else
										{{ $course->name }} (Lv. {{ $course->level }})
									@endif
								@else
									{{ $course->name }} (Lv. {{ $course->level }})
								@endif
							</div>
							<div class="duration_col">{{ $course->duration }} Hrs</div>
							<div class="date_col">
								{{ $course->location }}
							</div>
							<div class="duration_col">
								@can('Delete Course')
									{!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id] ]) !!}
	                        		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	                        		{!! Form::close() !!}
	                        	@endcan
								@if (!Auth::guest())
					            	@if (Auth::user()->hasRole('User'))
					                    <div>
					                        <a href="/courseregister/{{ $course->id }}"><button class="btn btn-danger">Register</button></a>
					                    </div>
									@endif
	                            @endif
							</div>
						</li>
		        	@endforeach
		        </ul>
            </div>
	    </div>
	    <div class="clearfix"> </div>
   	</div>
</div>
@endsection
