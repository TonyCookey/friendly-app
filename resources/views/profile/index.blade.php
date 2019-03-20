@extends('default')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <!-- User information and status -->
            @include('user.partials.userblock')
            <hr>
            @if (!$statuses->count())
            <p>{{$user->getNameOrUsername()}} hasn't posted anything yet</p>            
        @else
            @foreach ($statuses as $status)
                       <div class="media">
                                    <a href="{{route('profile.index',['username' =>$status->user->name])}}" class="pull-left">
                                    <img src="{{$status->user->getAvatarUrl()}}" alt="" class="media-object">
                                         </a>
                               <div class="media-body">
                                   <h6 class="media-heading mynavitems" style="margin-bottom:1px; margin-top:-3px;"><a class="text-decoration-none" href="{{route('profile.index',['username' =>$status->user->name])}}">{{ $status->user->getNameOrUsername()}}</a></h6>
                                   <p class="mynavitems" style="margin-bottom:0px;">{{$status->body}}</p>
                                   <ul class="list-inline mynavitems" style="margin-bottom:10px">
                                       <li class="list-inline-item smaller-font-size text-muted" ><strong><em>{{ $status->created_at->diffForHumans() }}</em></strong></li>
                                        @if (Auth::user()->hasLikedStatus($status))
                                                <li class="list-inline-item smaller-font-size"><a href="{{route('status.like',['statusId' => $status->id])}}" class="text-decoration-none"><i class="fa fa-thumbs-up"></i> Like</a></li>
                                         @else
                                         <li class="list-inline-item smaller-font-size"><a href="{{route('status.like',['statusId' => $status->id])}}" class="text-decoration-none"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                                        @endif
                                       <li class="list-inline-item smaller-font-size" >{{$status->likes->count()  }}  {{ str_plural('like', $status->likes->count())}}</li>
                                   </ul>
                                   @foreach ($status->replies as $reply)
                                            <div class="media">
                                                    <a href="{{route('profile.index',['username' =>$reply->user->name])}}"><img class="media-object" src="{{$reply->user->getAvatarUrl()}}" alt="">
                                                     </a>
                                                 <div class="media-body">
                                                     <h6 class="media-heading mynavitems" style="margin-bottom:1px; margin-top:-3px;"><a class="text-decoration-none" href="{{route('profile.index',['username' =>$reply->user->name])}}">{{ $reply->user->getNameOrUsername()}}</a></h6>
                                                     <p class="mynavitems" style="margin-bottom:0px;">{{$reply->body}}</p>
                                                        <ul class="list-inline mynavitems" style="margin-bottom:10px">
                                                                <li class="list-inline-item smaller-font-size text-muted" ><strong><em>{{ $reply->created_at->diffForHumans() }}</em></strong></li>
                                                                
                                                                    @if (Auth::user()->hasLikedStatus($reply))
                                                                            <li class="list-inline-item smaller-font-size"><a href="{{route('status.like',['statusId' => $reply->id])}}" class="text-decoration-none"><i class="fa fa-thumbs-up"></i> Like</a></li>
                                                                    @else
                                                                            <li class="list-inline-item smaller-font-size"><a href="{{route('status.like',['statusId' => $reply->id])}}" class="text-decoration-none"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                                                                    @endif
                                                                <li class="list-inline-item smaller-font-size" >{{$reply->likes->count()  }}  {{ str_plural('like', $reply->likes->count())}}</li>
                                                            </ul>

                                                    </div>
                                                </div>
                                              
                                   @endforeach
                                   @if ($authUserIsFriend || Auth::user()->id == $status->user->id)
                                   <form action="{{route('status.reply',['statusId' => $status->id])}}" method="post" role="form">
                                        <div class="form-group"> 
                                            {{ csrf_field() }}
                                        <textarea class="form-control {{$errors->has("reply-{$status->id}" )? 'is-invalid' : ''}}" name="reply-{{$status->id}}" id="reply" rows="1" placeholder="Reply to this status"></textarea>
                                        @if ($errors->has("reply-{$status->id}"))
                                        <div class="invalid-feedback">
                                           {{$errors->first("reply-{$status->id}")}}
                                          </div>
                                        @endif
                                        </div>
                                         <input type="submit" value="Reply" class="btn btn-sm btn-outline-{{Auth::user()->theme }}">
                                         <hr>
                                    </form>
                                   @endif
                               </div>
                        </div>     
            @endforeach
            {{$statuses->render()}}
        @endif
        </div>

        





        <div class="col-lg-4 offset-lg-2">
          <!-- Friends, Friend requests -->  
          @if (Auth::user()->hasFriendRequestPending($user))  
                <p class="small-font-size">Waiting for {{$user->getNameOrUsername()}} to accept your request</p>
          @elseif(Auth::user()->hasFriendRequestRecieved($user))
              <a href="{{route('friend.accept',['username' => $user->name]) }}" class="btn btn-primary givemespace">Accept friend request</a>
          @elseif(Auth::user()->isFriendsWith($user))
                <p style="margin-bottom:3px;">You and {{$user->getNameOrUsername()}} are friends</p>
                <form action="{{route('friend.delete',['username' => $user->name])}}" method="post" style="margin-bottom:5px;">
                    {{ csrf_field() }}
                   <input type="submit" value="  Delete Friend  " class="btn btn-danger" name="unfriend">
                </form>
                <hr>
          @elseif(Auth::user()->id !== $user->id)
            <a href="{{route('friend.add',['username' => $user->name]) }}" class="btn btn-primary givemespace">Add as Friend</a>
          @endif
        
            {{-- to check if the requested profile belongs to the authenticated user ; if not we can show the mutual friends --}}
            @if (Auth::user()->id == $user->id)
                    <h4 class="text-muted freeme text-capitalize"> Your Friends</h4>
                    @if ($user->friends()->count())
                        @foreach ($user->friends() as $user)               
                            @include('user.partials.userblock')                   
                        @endforeach
                    @else
                    <p>You have no friends yet</p>
                    @endif 
            @else
                    <h4 class="text-muted freeme text-capitalize">{{ $user->getLastnameOrUsernname()}}'s Friends</h4>
                    @if ($user->friends()->count())
                        @foreach ($user->friends() as $user)
            
                            @if (Auth::user()->isFriendsWith($user))
                            @include('user.partials.mutual_userblock')
                            @else
                            @include('user.partials.userblock') 
                            @endif
                        
                        @endforeach
                    @else
                    <p>{{ $user->getLastnameOrUsernname()}} has no friends</p>
                    @endif
            @endif

        
        </div>
    </div>
    
@endsection