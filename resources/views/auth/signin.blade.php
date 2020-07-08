@extends('welcome') @section('content')
<div class="row full-height">
    <div class="col-lg-4 col-sm-12 col-xs-12" style="padding:10vh 10vh; ">

        <div class="d-flex justify-content-center align-items-center">
            <img src="img/3.jpg" alt="Friendly Logo" height="200" width="200">
        </div>
    <!-- <h2 class="text-center text-primary">Login </h2> -->

        <form action="{{route('auth.signin')}}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="control-label">Email Address</label>
                <input class="form-control {{ $errors->has('email') ?  'is-invalid' : ''}}  " type="email" name="email" id="email" required> @if ($errors->has('email'))
                <div class="invalid-feedback">

                    {{$errors->first('email')}}
                </div>
                @endif

            </div>
            <div class="form-group">
                <label for="name" class="control-label">Password</label>
                <input class="form-control {{ $errors->has('password') ?  'is-invalid' : ''}}  " type="password" name="password" id="passwordname"
                    required> @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
                @endif

            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                    <label class="custom-control-label" for="customCheck1" style="padding-top:3px;">Remember me</label>
                </div>
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-large btn-outline-primary btn-block"> Sign in</button>

            </div>

        </form>
        <div class="text-center">
        <span class="">Don't have an account yet? <a href="{{route('auth.signup')}}">Sign up</a></span>
        </div>

    </div>

    <div class="col-lg-8 d-xs-none" id="bk-image">
        <div class="row">

        </div>
    </div> @endsection
