@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')
@section('page_heading','Search result ('.$count.' records found)')

@section('content')

<div class="courses_box1">
    <div class="container">
    	@if (auth()->check())
	    	@if (Auth::user()->hasRole('Admin'))
	    		<a href="{{ url('/usersearch') }}" class="btn btn-default pull-right">Search in user</a><br>
	    	@endif
    	@endif
    	
    	@php ($count = 1)
		@foreach ($searches as $search)
			<div class="col-lg-10">
				@if (!auth()->check())
					@if ($count == 5)
						<div class="alert alert-info"><h1>Want to learn more? <a href="{{ url('/register') }}">Subscribe</a> our platform and give us a try!</h1></div>
						@break;
					@endif
					@php ($count += 1)
				@endif	
				
				<h3>{!! $title = str_replace($input, "<span style='background-color: #FFFF00'>$input</span>", $search->title) !!}</h3>
				<p>{!! $body = str_replace($input, "<span style='background-color: #FFFF00'>$input</span>", $search->body) !!}</p>
				<br><hr>
			</div>
			@if (auth()->check())
				@if (Auth::user()->hasRole('Admin'))
					<div class="col-lg-1">
						<a href="{{ route('posts.show', $search->id ) }}"><i class="fa fa-pencil-square-o fa-4x"></i></a>
					</div>
				@endif
			@endif
		@endforeach
		<div class="col-lg-10">
			@if (auth()->check())
				{!! $searches->links() !!}
			@endif
		</div>
	</div>
</div>

@endsection