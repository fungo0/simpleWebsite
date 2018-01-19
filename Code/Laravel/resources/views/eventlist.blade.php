@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')

@push('flex_slider')
<link href="template/css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="template/js/jquery.flexslider.js"></script>
<script type="text/javascript">
	$(function(){
	  	SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  	$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
		  		$('body').removeClass('loading');
		    }	
	    });
	});
</script>

<!-- Calender -->
<link rel="stylesheet" href="/template/css/clndr.css" type="text/css" />
<script src="/template/js/underscore-min.js" type="text/javascript"></script>
<script src= "/template/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="/template/js/clndr.js" type="text/javascript"></script>
<script src="/template/js/site.js" type="text/javascript"></script>
<!--End Calender -->
@endpush

@section('content')
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
  		<h3>Events</h3>
  		<p class="description">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ url('/') }}">Home</a></li>
                <li class="current-page">Events</li>
            </ul>
        </div>
  	</div>
</div>
<!-- //banner -->
<div class="courses_box1">
   	<div class="container">
   		@if (!empty($flash_message))
            <div class="alert alert-success">
                <h2><center>{{ $flash_message }}</center></h2>
            </div>
        @endif
   	  	<div class="col-md-4">
   	  		<div class="cal1 cal_2">
   	  			@include('includes.calander')
	   	  	</div>
			@include('includes.leftcoursebox2')
		</div>
		@foreach ($events as $event)
			<div class="col-md-7 detail">
				<div class="event-page">
		       	 	<div class="row">
				   	 	<div class="col-xs-4 col-sm-4">
				   	 	  	<div class="event-img">
				   	 			<a href="{{ route('events.show', $event->id) }}"><img src="template/images/e1.jpg" class="img-responsive" alt=""/></a>
				   	 			<div class="over-image"></div>
				   	 	  	</div>
				   	 	</div>
			       	 	<div class="col-xs-7 col-sm-7 event-desc">
			       	 		<h2><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></h2>
			       	 	    <div class="event-info-text">
			       	 		   	<div class="event-info-middle">
			       	 		   		<p style="display:inline;"><span class="event-bold">Speakers : &nbsp;</span></p>
			       	 			   	<ul class="event-speakers" style="display:inline">
				   	 					<li><a href="">{{ $event->speaker }}</a></li>
			   	 				   	</ul>
			   	 				   	<p><span class="event-bold">Date : &nbsp;</span>{{ $event->created_at }}</p>
			   	 				   	<p><span class="event-bold">Venue : &nbsp;</span>{{ $event->venue }}</p>
			   	 				   	<p><span class="event-bold">Location : &nbsp;</span>{{ $event->location }}</p>
		       	 		   		</div>
		       	 	    	</div>
		       	  		</div>
		       		</div>
			    </div>
			</div>
			@can('Delete Event')
				<div class="col-md-1 detail">
					{!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id] ]) !!}
            		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            		{!! Form::close() !!}
				</div>
			@endcan
		@endforeach
		<ul class="pagination event_pagination">
	   	 	{!! $events->links() !!}
	   	</ul>
	    <div class="clearfix"> </div>
   	</div>
</div>
@endsection