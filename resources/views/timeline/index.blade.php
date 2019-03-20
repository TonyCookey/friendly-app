@extends('default')

@section('content')
<div class="row">
    <div class="col-lg-5">
        <form action="{{route('status.post')}}" method="post">
            <div class="form-group">
                {{ csrf_field() }}
            <textarea class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" rows="2" placeholder="What's up {{Auth::user()->getFirstnameOrUsernname()}}?"></textarea>
            @if ($errors->has('status'))
            <div class="invalid-feedback">
               {{$errors->first('status')}}
              </div>
            @endif
            </div>
            <button type="submit" class="btn btn-{{Auth::user()->theme}}">Update status</button>
        </form>
        <hr>
    <br>

        <!--timeline status and replies-->
        
        @if (!$statuses->count())
            <p>There's nothing in your timeline</p>            
        @else
            @foreach ($statuses as $status)
                       <div class="media">
                           <a href="{{route('profile.index',['username' =>$status->user->name])}}" class="pull-left">
                               <img src="{{$status->user->getAvatarUrl()}}" alt="" class="media-object">
                               </a>
                               <div class="media-body">
                                   <h5 class="media-heading mynavitems" style="margin-bottom:1px; margin-top:-3px;"><a href="{{route('profile.index',['username' =>$status->user->name])}}">{{ $status->user->getNameOrUsername()}}</a></h5>
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
                                                     <h5 class="media-heading mynavitems" style="margin-bottom:1px; margin-top:-3px;"><a href="{{route('profile.index',['username' =>$reply->user->name])}}">{{ $reply->user->getNameOrUsername()}}</a></h5>
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
                               </div>
                        </div>     
            @endforeach
            {{$statuses->render()}}
        @endif

    </div>
    <div class="col-lg-4 offset-lg-2">
        <!-- people you may know -->  
        <br>
        @if($randomusers->count())
            <h4 class="text-muted freeme" > Friend Suggestions</h4>
            @foreach ($randomusers as $user)
                @if(!Auth::user()->isFriendsWith($user))
                    @include('user.partials.userblock')
                @else
                {{-- do nothing --}}
                @endif
            @endforeach
        @endif

    </div>
</div>
@endsection