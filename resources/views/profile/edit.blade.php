@extends('default')

@section('content')
    <h4 class="text-muted freeme">Update your profile</h4>
    
    <div class="row">
            <div class="col-lg-7">
                
                <form action="{{route('profile.edit')}}" method="post" role="form">    
                            {{ csrf_field() }}        
                        <div class="form-group">     
                            <label for="first_name" class="control-label">First Name</label>    
                        <input  class ="form-control {{ $errors->has('first_name') ?  'is-invalid' : ''}}  " type="text" name="first_name" id="firstname" value="{{ Request::old('first_name') ?: Auth::user()->first_name}}" >
                            @if ($errors->has('first_name'))
                            <div class="invalid-feedback">
                               {{$errors->first('first_name')}}
                              </div>
                            @endif
                            
                        </div>

                        <div class="form-group">     
                                    <label for="lasme" class="control-label">last Name</label>    
                                    <input  class ="form-control {{ $errors->has('last_name') ?  'is-invalid' : ''}}  " type="text" name="last_name" id="lastname" value="{{ Request::old('last_name') ?: Auth::user()->last_name}}">
                                    @if ($errors->has('last_name'))
                                    <div class="invalid-feedback">
                                       {{$errors->first('last_name')}}
                                      </div>
                                    @endif
                                    
                        </div>       
                        <div class="form-group">     
                                            <label for="location" class="control-label">Location</label>    
                                            <input  class ="form-control {{ $errors->has('location') ?  'is-invalid' : ''}}  " type="text" name="location" id="location" aria-describedby="passwordHelpBlock"  value="{{ Request::old('location') ?: Auth::user()->location }}">
                                            @if ($errors->has('location'))
                                            <div class="invalid-feedback">
                                               {{$errors->first('location')}}
                                              </div>
                                            @else 
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                    Example: London, UK  (City, Country)
                                                  </small>
                                            @endif
                                            
                        </div>
                        <div class="form-group">
                          <label for="themeselect">Theme</label>
                          <select class="form-control" id="theme" name="theme">
                            <option disabled selected>Choose Theme</option>
                            <option value="primary" class="p-3 mb-2 bg-primary text-white">Friendly</option>
                            <option value="dark" class="p-3 mb-2 bg-dark text-white">Dark</option>
                            <option value="danger" class="p-3 mb-2 bg-danger text-white">Adventure</option>
                            <option value="secondary" class="p-3 mb-2 bg-secondary text-white">Solarized Dark</option>
                            <option value="success" class="p-3 mb-2 bg-success text-white" >Nature</option>
                            <option value="info" class="p-3 mb-2 bg-info text-white">Cool</option>
                              </select>
                        </div>
        
                        <div class="form-group">
   
                                <button type="submit"  class="btn btn-large btn-{{Auth::user()->theme }} btn-block"> Update</button>
                          
                          </div>
                         
                </form>


@endsection