<?php

namespace App\Http\Controllers;

use Auth; 
use App\User;

use App\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index ()
    {
      /**
       * get the statuses posted by you and your friends
       * only you and your friends and return the view
       */
      if(Auth::check()){
        $statuses = Status::notReply()->where(function ($query){
              return $query->where('user_id',Auth::user()->id)
              ->orWhereIn('user_id', Auth::user()->friends()->pluck('id')
        );
        })
        ->latest()
        ->paginate(10); 

        $randomusers = User::where('id', '!=', auth()->id())->orderByRaw('random()')->take(10)->get();       
      
        
         return view('timeline.index')
         ->with('statuses',$statuses)
         ->with('randomusers',$randomusers); 


      } 
       return view('auth.signup');
    }

    public function alert()
    {      
      return redirect()->route('home')->with('info','You have signed up');      
    }
}
