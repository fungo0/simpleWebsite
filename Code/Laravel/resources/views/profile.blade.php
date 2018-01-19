@extends('includes.header')

@push('profile_style')
<!-- profile css -->
<link rel="stylesheet" href="/template/css/profile.css" type="text/css" />

<style type="text/css">
	.message-submit{
	  background-color: #4169E1; 
	  border: none; 
	  color: white; 
	  padding: 1px 25px; 
	  margin: 10px 30px;
	  text-align: center;
	  font-size: 25px;
	  -webkit-transition-duration: 0.6s; /* Safari */
	  transition-duration: 0.6s;
	  cursor: pointer;
	}

	.submit1:hover{
	  background-color: red; 
	  color: white;
	}
</style>

<script src="template/js/easyResponsiveTabs.js"></script>
<!-- light-case -->
<script src="template/js/lightcase.js"></script>
<script src="template/js/jquery.events.touch.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//Horizontal Tab
		$('#parentHorizontalTab').easyResponsiveTabs({
			type: 'default', 				//Types: default, vertical, accordion
			width: 'auto', 					//auto or any width like 600px
			fit: true, 						// 100% fit in a container
			tabidentify: 'hor_1', 			// The tab groups identifier
			activate: function(event) { 	// Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#nested-tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
	});
</script>
<script>
	$('.showcase').lightcase();
</script>
@endpush

@section('content')

<div class="container">
	<div class="w3_agile_main_grids">
		@if (Session::has('info'))
	   		<div class="alert alert-success">
		        <h2><center>{{ Session::get('info') }}</center></h2>
		    </div>
		@endif
		<div class="w3layouts_main_grid_left">	
			<div class="w3_main_grid_left_grid">	
				<h2>Delightful Profile</h2>
				<p>Curabitur in turpis porta, tincidunt quam ac, consequat ante.</p>
				<div class="w3l_figure">
					<img src="avatar/avatar{{Auth::user()->id.Auth::user()->name}}/{{ $query2->icon }}" alt=" " />
					<br><br>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit Icon</button>
				</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"><h3 class="modal-title" id="exampleModalLabel">Upload file</h3></div>
                            <div class="modal-body">
                                <form method="POST" action="/editicon" enctype="multipart/form-data">
                                	{{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" id="recipient-name" name="avatar">
                                    </div>
                                    <div class="modal-footer">
		                            	<button type="submit" class="btn btn-primary">Save Avatar</button>
		                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				<ul><i class="fa fa-smile-o" style="margin: 10px; color: white; font-weight: bold;">Nickname: {{ $query2->nickname }}</i></ul>
				<ul><i class="fa fa-globe" style="margin: 25px; color: white; font-weight: bold;">Country: {{ $query2->country }}</i></ul>
				<ul class="agileinfo_social_icons">
					<li><a href="#" class="w3_agileits_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="wthree_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agileinfo_google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="btn_3" style="float: center;">
			  	<a href="{{ url('/editprofile') }}"><button type="submit" class="message-submit submit1" >Edit Your Profile</button></a>
		    </div>
		</div>
		<div class="w3layouts_main_grid_right">
			<div class="w3ls_main_grid_right_grid">	
				<div id="parentHorizontalTab">
					<div class="resp-tabs-container hor_1">
						<div class="agileits_main_grid_right_grid">	
							<p class="agileinfo_para">Aliquam sodales dolor ac lorem vulputate, eu maximus 
								velit semper. Sed erat lacus, ultrices in iaculis ac, 
								laoreet quis felis.Vivamus laoreet ultrices mi, quis euismod eros. 
								Sed et sodales leo, a porta turpis. Curabitur porta massa in quam sagittis vehicula. 
								<i>Sed vitae hendrerit ex. Aliquam in tortor venenatis, iaculis nunc eu, 
								vestibulum purus. Duis sed efficitur ipsum. Curabitur in turpis porta, 
								tincidunt quam ac, consequat ante.</i></p>
							</br>
							<div class="agileits_skills">
								<h3>My Skills</h3>
								<div class="w3_agileits_skills_grid">
									<ul>
										<li><label>Photoshop</label> <span></span> 56%</li>
										<li><label>Wordpress</label> <span></span> 95%</li>
										<li><label>HTML5</label> <span></span> 91%</li>
										<li><label>PHP</label> <span></span> 98%</li>
										<li><label>Multimedia</label> <span></span> 85%</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="wthree_main_grid_right_grid">
							<h3>Contact Me</h3>
							<form action="#" method="post">
								<div class="agileits_w3layouts_contact_left">
									<input type="text" name="Name" placeholder="Name" required="">
									<input type="email" name="Email" placeholder="Email" required="">
									<textarea placeholder="Message..." required=""></textarea>
								</div>
								<div class="clear"> </div>
								<div class="agile_submit">
									<input type="submit" value="Send">
								</div>
							</form>
							</br>
							</br>
							<div class="wthree_tab_grid">
								<ul class="wthree_tab_grid_list">
									<li><i class="fa fa-mobile" aria-hidden="true"></i></li>
									<li>Mobile<span>{{ $query2->mobile }}</span></li>
								</ul>
								</br>
								<ul class="wthree_tab_grid_list">
									<li><i class="fa fa-envelope-o" aria-hidden="true"></i></li>
									<li>Mail Me<span><a href="mailto:info@example.com">{{ $query->email }}</a></span></li>
								</ul>
								<div class="clear"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
</br>
</br>
@endsection