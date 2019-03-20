<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friend.index')
        ->with('friends',$friends)
        ->with('requests',$requests);
    }
    public function getAdd($name)
    {
       $user = User::where('name',$name)->first();

       if(!$user){
        return redirect()
        ->route('home')
        ->with('danger', 'User could not be found');
       }
       if (Auth::user()->id == $user->id) {
          return redirect()-> route('home');
       }
       if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){
            return redirect()
            ->route('profile.index', ['username' => $user->name])
            ->with('warning', 'Friend request already pending ');
       }
       if (Auth::user()->isFriendsWith($user)) {
             return redirect()
             ->route('profile.index', ['username' => $user->name])
           ->with('info', 'You are already friends');
       }
              Auth::user()->addFriend($user);
       return redirect()
       ->route('profile.index', ['username' => $user->name])
        ->with('info', 'Friend Request sent');

    
    }

    public function getAccept($name)
    {
        $user = User::where('name',$name)->first();
        if(!$user){
            return redirect()
            ->route('home')
                 ->with('danger', 'User could not be found');
                }

        if(!Auth::user()->hasFriendRequestRecieved($user)){
            return redirect()
            ->route('home');
        }
        Auth::user()->acceptFriendRequest($user);
        return redirect()
        ->route('profile.index',['username' =>$name])
        ->with('info', 'Friend Request accepted');
    }
    public function postDelete($name)
    {
        $user = User::where('name', $name)->first();

        if (!Auth::user()->isFriendsWith($user)) {
            return redirect()->back();
        }  
        //delete friend  '
        Auth::user()->deleteFriend($user);
        
        return redirect()->back()->with('info', 'Friendship Ended');
    }
    
}
