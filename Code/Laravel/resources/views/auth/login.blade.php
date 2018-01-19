@extends('includes.header')
@section('content')
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
	    <h3>Login</h3>
	    <p class="description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ url('/') }}">Home</a></li>
                <li class="current-page">Login</li>
            </ul>
        </div>
  	</div>
</div>
<!-- //banner -->
<div class="courses_box1">
   	<div class="container">
   	  	<form class="login" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
	    	<p class="lead">Welcome Back!</p>
		    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			    <input autocomplete="off" type="text" name="email" class="required form-control" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
		    </div>
		    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			    <input autocomplete="off" type="password" class="password required form-control" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
		    </div>
		    <div class="form-group">
  		    	<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
  		    	<input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" value="Log In">

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
		    </div>
            <p>Don not have an account? <a href="{{ url('/register') }}" title="Sign Up">Sign Up</a></p>
	    </form>
   	</div>
</div>
@endsection
