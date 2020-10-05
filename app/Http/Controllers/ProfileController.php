<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trust;

class ProfileController extends Controller
{
  public function getProfile($id)
  {
    if(Auth::guest())
    {
      $user = User::where('id', $id)->first();
      $datas = Message::where('user_id', $user->id)->get()->sortByDesc('created_at')->forPage(0, 5);
      return view('user', compact('user', 'datas'));
    }
    if (Auth::user())
    {
      $user = User::where('id', $id)->first();
      $datas = Message::where('user_id', $user->id)->get()->sortByDesc('created_at')->forPage(0, 5);
      $trust = Trust::where('trusted_id', $id)->get();
      $acsess = Trust::where('trusted_id', $id)->where('user_id', Auth::user()->id)->get();
      if ($acsess->isEmpty())
      {
        $text = 'Дать доступ к библиотеке';
      }
      else
      {
        $text = 'Оключить доступ к библиотеке';
      }
      return view('user', compact('user', 'datas', 'trust', 'text'));
    }
  }
}
