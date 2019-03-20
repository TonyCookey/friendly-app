
<nav class="navbar navbar-dark navbar-expand-md bg-{{Auth::check() ? Auth::user()->theme : 'primary' }}" style="margin-bottom:20px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}" style="font-family: 'Pacifico', cursive; font-size:30px;">Friendly</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div  class="collapse navbar-collapse" id="navcol-1">
              @if (Auth::check())              
                    <ul class="nav navbar-nav" style="font-family: 'Dancing Script', cursive; font-size:20px;">
                   <!-- <li class="nav-item mynavitems active" role="presentation"><a class="nav-link" href="#">    Home    </a></li>-->
                   @if (Auth::user()->friendRequests()->count())
                   <li class="nav-item mynavitems active" role="presentation"><a class="nav-link" href="{{route('friend.index')}}">Friends <span class="badge badge-pill badge-light" style="font-size:10px;">{{Auth::user()->friendRequests()->count()}}</span> </a></li>
                   @else
                   <li class="nav-item mynavitems active" role="presentation"><a class="nav-link" href="{{route('friend.index')}}">Friends </a></li>
                   @endif
                    <li class="nav-item mynavitems active"  role="presentation"><a class="nav-link" href="{{route('home')}}">   Timeline    </a></li>
                    </ul>
                <form class="form-inline" role="search" action="{{route('search.results')}}" style="font-family: 'Itim', cursive;">
                    <div class="form-group" style="margin-left:5px;"><i class="fa fa-search" style="color:white; margin-right:8px; "></i><input class="form-control" type="search" name="query" placeholder="Find People"></div>
                    <button class="btn btn-outline-light" type="submit" style="margin-left:5px;">Search</button>
                    </form>
                @endif 


                    <ul class="nav navbar-nav ml-auto" style="font-family: 'Kaushan Script', cursive; font-size:18px;" >
                @if (Auth::check())
                <li class="nav-item mynavitems " role="presentation" >
                    <a class="nav-link text-capitalize" href="{{route('profile.index', ['username' => Auth::user()->name ])}}">{{Auth::user()->getNameOrUsername() }}</a></li>
                <li class="nav-item mynavitems active" role="presentation"><a class="nav-link" href="{{route('profile.edit')}}"> Edit Profile</a></li>
                <li class="nav-item mynavitems" role="presentation" ><a class="btn btn-outline-light action-btn" href="{{route('auth.signout')}}">Sign out</a></li>
                    <!--<li class="dropdown active"><a class="btn btn-outline-light action-btn dropdown-toggle nav-link dropdown-toggle  mynavitems" data-toggle="dropdown" aria-expanded="false" href="#"> </a>
					
                        <div class="dropdown-menu" role="menu">
						        <a class="dropdown-item" role="presentation" href="">Sign Out</a>
						        <a class="dropdown-item" role="presentation" href="#">Profile</a>
					        	<a class="dropdown-item" role="presentation" href="#">Settings</a></div>
                    </li>
                -->
                @else
                <li class="nav-item mynavitems" role="presentation"><a class="nav-link" href="{{route('auth.signin')}}">Sign in</a></li>
                <li class="nav-item mynavitems" role="presentation"><a class="btn btn-outline-light action-btn" href="{{route('auth.signup')}}">Sign up</a></li>
                        </ul>
                @endif
        </div>
        </div>
    </nav>
    