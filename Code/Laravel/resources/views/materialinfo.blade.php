@extends('includes.header')

@section('content')
<div class="features">
    <div class="container">
   	  	<h1>Upload Course Material</h1>
   	  	<form method="POST" action="/uploadmaterial" enctype="multipart/form-data">
   	  		{{ csrf_field() }}
   	  		<div class="col-md-8">
   	  			{{ Form::label('Discipline', 'Course Discipline') }}
   	  			{{ Form::select('discipline', $global_disciplines) }}
   	  		</div>
   	  		<div class="col-md-4">
	   	  		<div class="form-group">
	   	  			<label>Select file (PDF)</label>
	                <input type="file" id="recipient-name" name="material">
	            </div>
	        </div>
	        <button class="btn btn-info" type="submit">Upload</button>
   	  	</form>
   	</div>
</div>

@endsection