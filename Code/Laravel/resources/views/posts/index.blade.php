@extends(Auth::user() ? Auth::user()->hasRole('Admin') ? 'layouts.dashboard' : 'includes.header' : 'includes.header')
 
@section('content')
    <div class="container">
        <div class="row">
            @if (!empty($flash_message))
                <div class="alert alert-success">
                    <h2><center>{{ $flash_message }}</center></h2>
                </div>
            @endif
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                    @foreach ($posts as $post)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                            <hr style="height: 1px;">
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
