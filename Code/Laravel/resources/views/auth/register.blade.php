@extends('includes.header')

@section('content')
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
  		<h3>Register</h3>
  		<p class="description">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ url('/') }}">Home</a></li>
                <li class="current-page">Register</li>
            </ul>
        </div>
  	</div>
</div>
<!-- //banner -->
<div class="courses_box1">
    <div class="container">
        @if (@session('response'))
            <div class="col-md-6"></div><div class="col-md-6 alert alert-success">{{ @session('response') }}</div>
        @endif
   	    <form class="login" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <p class="lead">Register New Account</p>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" autocomplete="off" class="required form-control" placeholder="Username *" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                <input id="nickname" type="text" autocomplete="off" class="required form-control" placeholder="Nickname *" name="nickname" value="{{ old('nickname') }}" required autofocus>

                @if ($errors->has('nickname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nickname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="text" autocomplete="off" class="required form-control" placeholder="Email *" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="required form-control" placeholder="Password *" name="password" value="" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="required form-control" placeholder="Confirm Password *" name="password_confirmation" value="" required>
            </div>
            <div class="row">
                <div class="col-md-1"><label>Gender</label></div>
                <div class="col-sm-3">
                    <label><input type="radio" name="gender" class="form-control" value="Male" checked="">Male</label>
                </div>
                <div class="col-sm-3">
                    <label><input type="radio" name="gender" class="form-control" value="Female" checked="">Female</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile *">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2"><label>Country</label></div>
                    <div class="col-md-8">
                        <select class="form-control" name="country">
                            <option></option>
                            <option>China</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Australia</option>
                            <option>Japan</option>
                        </select>
                    </div>
                </div>
            </div>
            </br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" value="Register">
            </div>
            <p>Already have an account? <a href="{{ url('/login') }}">Sign In</a></p>
        </form>
    </div>
</div>
@endsection
