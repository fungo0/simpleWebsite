<div class="courses_box1-left">
	<h3><center>Course Seach</center></h3>
	{{ Form::open(array('url' => '/courselist')) }}
		<div class="select-block1">
			<hr>
			Discipline{{ Form::select('discipline', $global_disciplines, null) }}
			Duraion{{ Form::selectRange('duration', 0, 5) }}
			Level{{ Form::selectRange('level', 0, 6) }}
			Location{{ Form::select('location', array('China' => 'China', 'USA' => 'USA', 'HK' => 'HK'), 'HK') }}
			Strict{{ Form::checkbox('strict', 'strict') }}
			<input type="submit" value="search" class="course-submit">
		</div>
	{{ Form::close() }}
</div>
<div class="personBox">
    <div class="personBox_1">
        <div class="person_image">
            <img src="/template/images/t13.png" class="img-responsive" alt=""/> 
        </div>
        <div class="person_image_desc">
           <h1>Lorem Ipsum</h1>
           <p>Tempor Incididunt</p>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="person_description">
        <p>
            On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble <a href="#">More..</a>
        </p>
    </div>
</div>
<div class="social-widget">
  	<h2>Connect with us</h2>
  	<ul class="courses_social">
		<li class="facebook-icon">
			<div>
				<a href="#" class="fa fa-facebook"></a>
				<p>2154</p>
			</div>        							
		</li>
		<li class="twitter-icon">
			<div>
				<a href="#" class="fa fa-twitter"></a>
				<p>1425</p>
			</div>        							
		</li>
		<li class="gplus-icon">
			<div>
				<a href="#" class="fa fa-google-plus"></a>
				<p>2150</p>
			</div>        							
		</li>
		<div class="clearfix"> </div>
	</ul>
</div>
<section class="slider">
	<h3>Testimonial</h3>
	<div class="flexslider">
		<ul class="slides">
			<li>
				<div class="banner-info1">
				   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat quis nostrud.</p>	
				   <h5><a href="#">Laoreet ,</a>Dateratr since 2015</h5>
				</div>
			</li>
			<li>
				<div class="banner-info1">
				   <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, content of a page.</p>	
				   <h5><a href="#">Distracted ,</a>Dateratr since 2015</h5>
				</div>
			</li>
			<li>
				<div class="banner-info1">
				   <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of usin but the majority.</p>	
				   <h5><a href="#">Suffered ,</a>Dateratr since 2015</h5>
				</div>
			</li>
	    </ul>
	</div>
</section>
<ul class="posts">
  	<h3>Recent Posts</h3>
	<li>
		<article class="entry-item">
			<div class="entry-thumb pull-left">
				<img src="/template/images/t17.jpg" class="img-responsive" alt=""/>
			</div>
			<div class="entry-content">
				<h6><a href="#">Established</a></h6>
				<p><a href="#">Admin</a> &nbsp;/&nbsp; 30 Dec 2015</p>
			</div>
			<div class="clearfix"> </div>
		</article>
	</li>
	<li>
		<article class="entry-item">
			<div class="entry-thumb pull-left">
				<img src="/template/images/t7.jpg" class="img-responsive" alt=""/>
			</div>
			<div class="entry-content">
				<h6><a href="#">Established</a></h6>
				<p><a href="#">Admin</a> &nbsp;/&nbsp; 30 Dec 2015</p>
			</div>
			<div class="clearfix"> </div>
		</article>
	</li>
	<li>
		<article class="entry-item">
			<div class="entry-thumb pull-left">
				<img src="/template/images/t16.jpg" class="img-responsive" alt=""/>
			</div>
			<div class="entry-content">
				<h6><a href="#">Established</a></h6>
				<p><a href="#">Admin</a> &nbsp;/&nbsp; 30 Dec 2015</p>
			</div>
			<div class="clearfix"> </div>
		</article>
    </li>
</ul>