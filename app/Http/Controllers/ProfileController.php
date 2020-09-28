<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function getProfile($id)
  {
    $user = User::where('id', $id)->first();
    $datas = Message::where('user_id', $user->id)->get();
    if (!$user)
    {
      abort(404);
    }
    return view('user', compact('user', 'datas'));
  }
}
