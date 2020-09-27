<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function getReg()
  {
    return view('reg');
  }

  public function postReg(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|unique:users|email|max:50',
      'password' => 'required|min:5',
    ]);

    User::create([
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
    ]);

    return redirect()->route('auth');
  }

  public function getAuth()
  {
    return view('auth');
  }

  public function postAuth(Request $request)
  {
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password')))
    {
      return redirect()->back();
    }
    return redirect()->route('main');
  }

  public function getSignout()
  {
    Auth::logout();
    return redirect()->route('main');
  }
}
