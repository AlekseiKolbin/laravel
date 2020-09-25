<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
  public function auth(){
    return view('auth');
  }
  public function user(){
    return view('user');
  }
  public function mycomments(){
    return view('mycomments');
  }
  public function userslist(){
    return view('userslist');
  }
  public function library(){
    return view('library');
  }
}
