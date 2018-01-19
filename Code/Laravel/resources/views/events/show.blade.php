@extends('includes.header')

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
		<div class="col-md-8 detail">
	       	<img src="images/event.jpg" class="img-responsive" alt=""/>
	       	@can('Edit Course')
	       		<a href="{{ route('events.edit', $event->id) }}"><div><i class="fa fa-pencil-square fa-2x" style="float: right">Edit</i></div></a>
	       	@endcan
	       	<h3>{{ $event->title }}</h3>
	        <ul class="meta-post">
	            <li class="author">
	                by <a href="#">{{ $user->name }}</a>
	            </li>
	            <li class="view">
	               {{ $event->created_at }}
	            </li>
	            <li class="category">
	                {{ $event->venue }}
	            </li>                             
	       	</ul>
	       	<p>{{ $event->content }}</p>
	       	<div class="author-box author-box1">
	            <div class="author-box-left"><img src="images/t13.png" class="img-responsive" alt=""/></div>
				<div class="author-box-right">		
					<h4>Author by <a href="#">{{ $user->name }}</a></h4>
	                <p>Lorem ipsum doldor sit amet, consectetur adeipiscing elit, sed do eiusmod temdpor incididuent ut labore et doelore magna aliqua.. Lorem ipsum doldor sit amet, consectetur adeipiscing elit, sed do eiusmod temdpor incididuent ut labore et doelore magna aliqua..</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="comment_section">
			 	<ul class="comment-list">
			 		@foreach ($comments as $comment)
			 			<li>
						    <div class="author-box">
						       	<div class="author-box_left"><img src="images/t13.png" class="img-responsive" alt=""/></div>
						       	<div class="author-box_right">
							        <h5><a href="#">{{ $comment->user->name }}</a></h5>
						            <span class="m_1">Post at: {{ $comment->created_at }}</span>
						            <p>{{ $comment->comment }}</p>
						            @if (!$comment->created_at->eq($comment->updated_at))
						            	<span class="m_1">Update at: {{ $comment->updated_at }}</span>
						            @endif
						      	</div> 
						      	<div class="clearfix"> </div>
						    </div>
						</li>
			 		@endforeach
		        </ul>
			</div>
			<form class="comment-form" method="POST" action="{{ url('/comment/'.$event->id) }}">
				{{ csrf_field() }}
			 	<h4>Leave a comment</h4>
				<div class="col-md-6 comment-form-right">
					<textarea name="comment" aria-required="true" id="comment" class="form-control" placeholder="Comment"></textarea>
				</div>
				<div class="form-submit" style="padding: 75px">
				  	<input name="submit" type="submit" id="submit" class="submit_1 btn btn-primary btn-block" value="Add comment"> 
				</div>						  
	       	</form>
		</div>
		<div class="clearfix"> </div>
   	</div>
</div>
@endsection