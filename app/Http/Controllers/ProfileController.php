<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
    //     $youmayknow = User::all()->random(10);

    //    dd($youmayknow);   

       $user = User::where('name',$username)->first();
       if(!$user){
           abort(404);
       } 
       $statuses = $user->statuses()->notReply()->latest()->paginate(10);
       
      
       return view('profile.index')
       ->with('user',$user)
       ->with('statuses', $statuses)
       ->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
            

    }
    public function getEdit()
    {
        return view('profile.edit');
    }
    public function postEdit(Request $request)
    {
       
       $this->validate($request,[
           'first_name' =>  ['alpha','max:25'],
           'last_name' =>  ['alpha', 'max:25'],
           'location' =>  [ 'max:25'],
           
           ]);
          
           Auth::user()->update([
               'first_name' =>$request->input('first_name'),
               'last_name' =>$request->input('last_name'),
               'location' =>$request->input('location'),
               'theme' =>$request->input('theme'),
           ]);
           return redirect()->route('profile.edit')->with('info','Your profile has been updated');
       
    }
}
