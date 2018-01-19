<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Learn: Education Category Flat Bootstarp Resposive Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Learn" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Default Bootstrap -->
    <link href="/template/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/jquery.countdown.css" rel="stylesheet" type="text/css" />

    <!-- font-Awesome -->
    <link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href="/template/css/font-awesome.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/template/js/jquery.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>

    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <script>
        $(document).ready(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- Default Laravel Auth Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @stack('responsiveslides_style')
    @stack('profile_style')
    @stack('flex_slider')
    @stack('message_button')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Learn</a>
                </div>
                <!--/.navbar-header-->
                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                    <!-- Left Side Of Navbar to be edit-->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest())
                            <li><a href="{{ route('posts.create') }}">New Article</a></li>
                            
                            @if (Auth::user()->hasRole('Speaker'))
                                <li><a href="{{ route('courses.create') }}">New Course</a></li>
                                <li><a href="{{ route('events.create') }}">New Event</a></li>
                            @endif
                        @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="dropdown">
                                <a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i><span>Login</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/register') }}"><i class="fa fa-plus"></i><span>Register</span></a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span>{{ Auth::user()->name }}</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                                    @if (Auth::user()->hasRole('User'))
                                        <li><a href="{{ url('/mycourse') }}">My Course</a></li>
                                    @endif
                                    <li><a href="{{ url('/change') }}">
                                        Notifications 
                                        @if (Session::has('notifications') && Session::get('notifications') > 0)
                                            <em>({{ Session::get('notifications') }})</em>
                                        @endif
                                    </a></li>
                                </ul>
                            </li>
                        @endguest
                        <li class="dropdown">
                            <li><a href="{{ route('courses.index') }}"><i class="fa fa-list"></i><span>Courses Lists</span></a></li>    
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('events.index') }}"><i class="fa fa-calendar"></i><span>Events</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i><span>Search</span></a>
                            <ul class="dropdown-menu search-form">
                                <form method="POST" action="{{ url('/search') }}">
                                    {{ csrf_field() }}
                                    <input type="text" class="search-text" name="search" placeholder="Search...">
                                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                                </form>
                            </ul>
                        </li>
                        @if (@session('login') || auth()->check())
                            <li class="dropdown">
                                <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        <!--/.navbar-collapse-->
        </nav>

        <nav class="navbar nav_bottom" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav nav_1">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/faculty') }}">Faculty</a></li>
                        <li><a href="{{ url('/services') }}">Services</a></li>
                        <li><a href="{{ url('/features') }}">Features</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/career') }}">Career</a></li>
                        <li class="last"><a href="{{ url('/contacts') }}">Contacts</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        @if(Session::has('flash_message'))
            <div class="container">
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/template/js/script.js"></script>
    <script src="/template/js/jquery.countdown.js"></script>
    @yield('payment')
</body>
</html>
