@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')

@section('content')
<div class="container">
	<div class="content">
		<div class="alert alert-danger">
	        <h2><center>{{ $error }}</center></h2>
	    </div>
	</div>
</div>
@endsection