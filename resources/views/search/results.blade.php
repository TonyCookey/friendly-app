@extends('default')

@section('content')

    <h4 class="text-muted freeme">Your search for "{{ Request::input('query')}}"</h4>
    @if ($users->count())
    <div class="row">  
            <div class="col-lg-10">
                @foreach ($users as $user)
                @include('user.partials.userblock')
                @endforeach
            </div>

        </div>    
    @else
        <p>No records found</p>
    @endif
    
      
@endsection