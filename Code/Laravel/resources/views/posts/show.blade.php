@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')

@section('content')
    <div class="container">
        @if (!empty($flash_message))
            <div class="alert alert-success">
                <h2><center>{{ $flash_message }}</center></h2>
            </div>
        @endif
        <h1>{{ $post->title }}</h1>
        <hr>
        <p class="lead">{{ $post->body }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

        @can('Edit Post')
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
        @endcan

        @can('Delete Post')
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        @endcan
        {!! Form::close() !!}

    </div>
@endsection
