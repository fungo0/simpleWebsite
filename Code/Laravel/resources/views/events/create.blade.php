@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')

@push('flex_slider')
<!-- Calender -->
<link rel="stylesheet" href="/template/css/clndr.css" type="text/css" />
<script src="/template/js/underscore-min.js" type="text/javascript"></script>
<script src= "/template/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="/template/js/clndr.js" type="text/javascript"></script>
<script src="/template/js/site.js" type="text/javascript"></script>
<!--End Calender -->
@endpush

@section('content')
<div class="courses_box1">
   	<div class="container">
   		@if (!empty($flash_message))
            <div class="alert alert-success">
                <h2><center>{{ $flash_message }}</center></h2>
            </div>
        @endif
		<div {{ (Auth::user()->hasRole('Admin')? 'class="col-md-12 detail"' : 'class="col-md-9 detail"' ) }}>
			<h1>Create New Event</h1>
            <hr>
            {{ Form::open(array('route' => 'events.store')) }}

            <div class="form-group">
                {{ Form::label('Title', 'Event Title') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::label('Content', 'Event Content') }}
                {{ Form::textarea('content', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::label('Speaker', 'Speaker(Please use "," to separate guests)') }}
                {{ Form::text('speaker', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::label('Venue', 'Event Venue') }}
                {{ Form::text('venue', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::label('Location', 'Event Location') }}
                {{ Form::text('location', null, array('class' => 'form-control')) }}
                <br>
                <br>

                {{ Form::submit('Create Event', array('class' => 'btn btn-success btn-lg btn-block')) }}
            </div>
            {{ Form::close() }}
		</div>
        @if (Auth::check())
            @if (!Auth::user()->hasRole('Admin'))
        		<div class="col-md-3">
           	  		<div class="cal1 cal_2">
           	  			@include('includes.calander')
        	   	  	</div>
        		</div>
            @endif
        @endif
	    <div class="clearfix"> </div>
   	</div>
</div>
@endsection