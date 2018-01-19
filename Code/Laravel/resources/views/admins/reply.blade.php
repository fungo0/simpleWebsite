@extends('layouts.dashboard')

@push('message')
<style type="text/css">
	hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
	hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
	hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

	.search-result .thumbnail { border-radius: 0 !important; }
	.search-result:first-child { margin-top: 0 !important; }
	.search-result { margin-top: 20px; }
	.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
	.search-result ul { padding-left: 0 !important; list-style: none;  }
	.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
	.search-result ul li i { padding-right: 5px; }
	.search-result .col-md-7 { position: relative; }
	.search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
	.search-result h3 > a, .search-result i { color: #248dc1 !important; }
	.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
	.search-result span.plus { position: relative; float: right;}
	.search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
	.search-result span.plus a:hover { background-color: #414141; }
	.search-result span.plus a i { color: #fff !important; }
	.search-result span.border { display: inline-block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
</style>
@endpush

@section('content')

<div class="container">
    <hgroup class="mb20">
		<h1>New Messages</h1>
		<h2 class="lead"><strong class="text-danger">{{ $count }}</strong> results was fetched.</h2>								
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
    	@foreach ($messages as $message)
			<article class="search-result row">
				<div class="col-xs-12 col-sm-12 col-md-4">
					<ul class="meta-search">
						<li><i class="glyphicon glyphicon-inbox"></i> <span>{{ $message->email }}</span></li>
						<li><i class="glyphicon glyphicon-time"></i> <span>{{ $message->created_at->toDateString() }}</span></li>
						<li><i class="glyphicon glyphicon-phone"></i> <span>{{ $message->phone }}</span></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-8 excerpet">
					<span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
					<h3>{{ $message->name }}</h3>
					<p>{{ $message->message }}</p>
				</div>
			</article>
		@endforeach
	</section>
</div>
@endsection