@extends('includes.header')

@section('content')
<!-- banner -->
<div class="courses_banner">
	<div class="container">
		<h3>Material</h3>
		<p class="description">
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
    </p>
    <div class="breadcrumb1">
        <ul>
            <li class="icon6"><a href="{{ url('/') }}">Home</a></li>
            <li class="current-page">Material</li>
        </ul>
    </div>
	</div>
</div>
<!-- //banner -->
<div class="features">
    <div class="container">
   	  	<h1>Course Material</h1>
   	  	@if (!empty($flash_message))
            <div class="alert alert-success">
                <h2><center>{{ $flash_message }}</center></h2>
            </div>
        @endif
   	  	
		@if ($materials->count() != 0)
			<table class="table">
				<thead class="thead-dark">
				    <tr>
					    <th scope="col">Discipline</th>
					    <th scope="col">File</th>
					    <th scope="col">Upload Time</th>
					    <th scope="col">File Size(B)</th>
					    @if (Auth::check())
					    	<th scope="col">download</th>
					    @endif
				    </tr>
				</thead>
				<tbody>
					@foreach ($materials as $material)
						<tr>
					        <th>{{ $material->discipline }}</th>
					        <td>{{ $material->name }}</td>
					        <td>{{ $material->created_at }}</td>
					        <td>{{ $material->filesize }}</td>
					        @if (Auth::check())
						    	<td><a href="{{ url('/download/'.$material->hashname) }}"><i class="fa fa-download"></i></a></td>
						    @endif
					    </tr>
	   	  			@endforeach
				</tbody>
			</table>
		@else 
  			<center><h2>There is no available material yet......</h2></center>
  		@endif

  		@if (Auth::check())
  			@if (Auth::user()->hasRole('Speaker'))
  			<hr>
  			<center><a href="{{ url('/materialinfo') }}"><button class="btn btn-success btn-lg">Upload Course Material</button></a></center>
  			@endif
  		@endif
   	  	
  	</div>
</div>
@endsection