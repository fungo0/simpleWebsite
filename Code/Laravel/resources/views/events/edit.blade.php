@extends('includes.header')

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
		<div class="col-md-9 detail">
			<h1>Update Event</h1>
            <hr>
            {{ Form::model($event, array('route' => array('events.update', $event->id), 'method' => 'PUT')) }}

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

                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>
            {{ Form::close() }}
		</div>
		<div class="col-md-3">
   	  		<div class="cal1 cal_2">
   	  			@include('includes.calander')
	   	  	</div>
		</div>
	    <div class="clearfix"> </div>
   	</div>
</div>
@endsection