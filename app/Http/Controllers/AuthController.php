<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }
      
   public function postSignup(Request $request)
   {


     $this->validate($request,[
        'name' => ['required', 'string', 'max:255','alpha_dash'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8',],
     ]);

     User::create([
      'email'=> $request->input('email'),
      'name'=> $request->input('name'),
      'password'=> bcrypt($request->input('password')),
     ]);

     return redirect()->route('auth.signin')->with('info','Your account has been succesfully created. Please sign in');
   } 

  public function getSignin()
  {
    return view('auth.signin');
  }
  public function postSignin(Request $request)
  {
    $this->validate($request,[
      'email' => ['required','string'],
      'password' => ['required', 'string', 'min:8'],
   ]);
   if(!Auth::attempt($request->only(['email','password']),$request->has('remember')))
   {
     return redirect()->back()->with('danger','Could not sign in');
   }
   else {
    return redirect()->route('home')->with('info','You are now signed in');
   }
  }
  public function getSignout()
  {
    Auth::logout();
    return redirect()->route('auth.signin');
  }
}
