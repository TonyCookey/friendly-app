<?php

namespace App\Http\Controllers;

use Auth;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $this->validate($request,[
            'status'  => ['required', 'max:1000'],
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status')
        ]);
        return redirect()->route('home')->with('info', 'Status posted');
    }

    public function postReply(Request $request,$statusId)
    {
        /**
         * validate the reply and creating a custom  reuqired error message
         * */

        $this->validate($request,[
            "reply-{$statusId}" => 'required|max:1000',
        ],[
            'required' => 'The reply field is required',
            'max' => 'Your reply should not exceed 1000 characters'
        ]);

        $status = Status::notReply()->find($statusId);

        if(!$status){
            return redirect()->route('home');
        }
        if(!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id){
            return redirect()->route('home')->with('danger', 'You cannot reply to the Status of an Acquaintance. Please send Friend Request');
        }
/**
 * associate() was not working
 * so i used the Auth::user and called the statuses method 
 * to associate the reply(status(since a reply is also a status)) with the user
 * then associated the reply to the parent status
 * i just got it
 * for you to use a create method
 * the create method creates a database entry
 * for you to associate it with a user(any model) you have to set the foreign key column to null 
 * so that it can create an entry with a null foreign key
 * the use the save method to establish the belongsTo or hasMany with the user.
 */
        $reply = Auth::user()->statuses()->create([
            
            'body' => $request->input("reply-{$statusId}"),
        ]);
      
        $status->replies()->save($reply);

        return redirect()->back()->with('info','Reply posted');
    }
    public function getLike($statusId)
    {
            $status =Status::find($statusId);

            if(!$status){
                return redirect()->route('home');
            }
            if(Auth::user()->hasLikedStatus($status))
            {
                return redirect()->back();
            }
            
            $like = $status->likes()->create([
        
            ]);

            Auth::user()->likes()->save($like);

           return redirect()->back();
    }
   
}
