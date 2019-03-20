@extends('default')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <h4 class="text-muted freeme">Your Friends</h4>
            <!-- List of Friends -->
            @if ($friends->count())
                @foreach ($friends as $user)
                     @include('user.partials.userblock')
                @endforeach
            @else
                 <p>You have no friends</p>
            @endif

        </div>
        <div class="col-lg-4">
            
            <h4 class="text-muted">Friend requests</h4>
            <!-- List of Friend requests -->
            @if ($requests->count())
                @foreach ($requests as $user)
                    @include('user.partials.userblock')
                @endforeach
            @else
                <p>You have no Friend requests</p>
            @endif
        </div>
    </div>
@endsection     