@extends('welcome') @section('content')

<div class="row full-height">
    <div class="col-lg-4" style="padding:0vh 10vh;">
        <div class="d-flex justify-content-center align-items-center">
                <img src="img/3.jpg" alt="Friendly Logo" height="200" width="200">
            </div>
        <!-- <h2  class="text-center text-primary"> Sign up </h2> -->

        <form action="{{route('auth.signup')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="control-label">Username</label>
                <input class="form-control {{ $errors->has('name') ?  'is-invalid' : ''}}  " type="text" name="name" id="username" required> @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
                @endif

            </div>
            <div class="form-group">
                <label for="name" class="control-label">Email</label>
                <input class="form-control {{ $errors->has('email') ?  'is-invalid' : ''}}  " type="email" name="email" id="email" required> @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{$errors->first('email')}}
                </div>
                @endif

            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input class="form-control {{ $errors->has('password') ?  'is-invalid' : ''}}  " type="password" name="password" id="passsword"
                    required> @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
                @else
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters,
                    or emojis.
                </small>
                @endif

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-large btn-outline-primary btn-block"> Sign up</button>

            </div>

        </form>
        <div class="text-center">
            <span class="">Already have an account? <a href="{{route('auth.signin')}}">Sign in</a></span>
        </div>
    </div>
    <div class="col-lg-8" id="bk-image-2">
        <div class="row">

        </div>
    </div>
</div>
@endsection
