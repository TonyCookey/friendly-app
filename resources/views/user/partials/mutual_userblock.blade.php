<div class="media freemesmall" style="margin-bottom:5px; margin-top:5px;">
    <a href="{{ route('profile.index',['username' => $user->name ])}}" class="pull-left">
    <img src="{{ $user->getAvatarUrl()}}" alt="" class="media-object rounded-circle">
    </a>
    <div class="media-body">
        <h5 class="media-heading text-capitalize mynavitems" style="margin-bottom:5px; margin-top:-3px;" >
            <a  class="text-decoration-none" href="{{ route('profile.index',['username' => $user->name ])}}">{{$user->getNameOrUsername()}} 
            </a> 
            <span class="badge badge-primary" style="font-size:12px; font-family:'Poppins', sans-serif;">mutual friend</span>
        </h5>
        @if ($user->location)
            <p class="mynavitems comeup">{{$user->location}}</p>            
        @endif
    </div>
</div>