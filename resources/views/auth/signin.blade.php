@extends('default')    

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
     
        <h1>Sign in </h1>
<form action="{{route('auth.signin')}}" method="post" role="form">
       {{ csrf_field() }}
<div class="form-group">     
<label for="name" class="control-label">Email Address</label>    
<input  class ="form-control {{ $errors->has('email') ?  'is-invalid' : ''}}  " type="email" name="email" id="email" required>
@if ($errors->has('email'))
<div class="invalid-feedback">
   {{$errors->first('email')}}
  </div>
@endif

</div>
<div class="form-group" >     
        <label for="name" class="control-label">Password</label>    
        <input  class ="form-control {{ $errors->has('password') ?  'is-invalid' : ''}}  " type="password" name="password" id="passwordname" required>
        @if ($errors->has('password'))
        <div class="invalid-feedback">
           {{$errors->first('password')}}
          </div>
        @endif
        
</div>
<div class="form-group">    
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
    <label class="custom-control-label" for="customCheck1">Remember me</label>
  </div>
</div>
<div class="form-group">
   
          <button type="submit"  class="btn btn-large btn-primary btn-block"> Sign in</button>
    
    </div>
    
</form>    
    </div>
</div>

@endsection