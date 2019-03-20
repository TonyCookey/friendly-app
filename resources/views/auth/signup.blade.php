@extends('default')

@section('content')
   
<div class="row">
    <div class="col-lg-6 offset-lg-3">
     
      
        <h2> Sign up </h2>
        
        <form action="{{route('auth.signup')}}" method="post">    
            {{ csrf_field() }}        
            <div class="form-group">     
                    <label for="name" class="control-label">Username</label>    
                    <input  class ="form-control {{ $errors->has('name') ?  'is-invalid' : ''}}  " type="text" name="name" id="username" required>
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                       {{$errors->first('name')}}
                      </div>
                    @endif
                    
                    </div>
                    <div class="form-group">     
                            <label for="name" class="control-label">Email</label>    
                            <input  class ="form-control {{ $errors->has('email') ?  'is-invalid' : ''}}  " type="email" name="email" id="email"  required>
                            @if ($errors->has('email'))
                            <div class="invalid-feedback">
                               {{$errors->first('email')}}
                              </div>                                                
                            @endif
                            
                            </div>
                            <div class="form-group">     
                                    <label for="password" class="control-label">Password</label>    
                                    <input  class ="form-control {{ $errors->has('password') ?  'is-invalid' : ''}}  " type="password" name="password" id="passsword"  required>
                                    @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                       {{$errors->first('password')}}
                                      </div>
                                    @else 
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emojis.
                                          </small>
                                    @endif
                                    
                                    </div>

                                    <div class="form-group">
   
                                        <button type="submit"  class="btn btn-large btn-primary btn-block"> Sign up</button>
                                  
                                  </div>
                 
        </form>
    </div>
</div>
@endsection