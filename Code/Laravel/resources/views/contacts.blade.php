@extends('includes.header')

@push('message_button')
<style type="text/css">
	.message-submit{
	  background-color: #FFA500; 
	  border: none; 
	  color: white; 
	  padding: 15px 32px; 
	  text-align: center;
	  -webkit-transition-duration: 0.4s; /* Safari */
	  transition-duration: 0.4s;
	  cursor: pointer;
	}

	.submit1:hover{
	  background-color: gray; 
	  color: black;
	}
</style>
@endpush

@section('content')
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
  		<h3>Contact</h3>
  		<p class="description">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ url('/') }}">Home</a></li>
                <li class="current-page">Contact</li>
            </ul>
        </div>
  	</div>
</div>
<!-- //banner -->
<div class="features">
   <div class="container">

   		@if (!empty($success))
	   		<div class="alert alert-success">
		        <h2><center>{{ $success }}</center></h2>
		    </div>
		@endif

	   	<h1>How to find us</h1>
	   	<div class="map">
			<iframe width='100%' height='200' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='http://maps.google.com.tw/maps?f=q&hl=en&geocode=&q=香港理工大學&z=16&output=embed&t='></iframe>
		</div>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		<div class="wrapper">
			<div class="col_1">
				<i class="fa fa-home  icon2"></i>
				<div class="box">
					<p class="marTop9">7401 Excepteur sint,<br>Deserunt mollit .</p>
				</div>
			</div>

			<div class="col_2">
				<i class="fa fa-phone  icon2"></i>
				<div class="box">
					<p class="marTop9">+1 800 254 5478<br>+1 800 587 47895</p>
				</div>
			</div>

			<div class="col_2">
				<i class="fa fa-envelope icon2"></i>
				<div class="box">
					<p class="m_6"><a href="mailto@example.com" class="link4">info(at)Learn.com</a></p>
				</div>
			</div>
			<div class="clearfix"> </div>
	 	</div>
		<form class="contact_form" action="{{ url('/message') }}" method = "POST">
            {{ csrf_field() }}
		 	<h2>Contact form</h2>
			<div class="col-md-6 grid_6">
				<input type="text" class="text" name="name" value="Name" placeholder="name" >
				<input type="text" class="text" name="email" value="Email" placeholder="email" >
				<input type="text" class="text" name="phone" value="Phone" placeholder="phone" >
			</div>

			<div class="col-md-6 grid_6">
				<textarea name="message" value="Message" placeholder="message" >Message</textarea>
			</div>
	        <div class="clearfix"> </div>
	        <div class="btn_3">
			  	<button type="submit" class="message-submit submit1" >Send message</button>
		    </div>
		</form>					
  	</div>
</div>
@endsection