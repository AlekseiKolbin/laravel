<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
  public function auth(){
    return view('auth');
  }
  public function mycomments(){
    return view('mycomments', ['datas' => Message::where('profile_id', Auth::user()->id)->get()]);
  }
  public function userslist(){
    $users = \App\Models\User::get();
    return view('userslist', compact('users'));
  }
}
