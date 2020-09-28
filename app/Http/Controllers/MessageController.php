<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
  public function postMessage(Request $request, $id)
  {

    $user = User::where('id', $id)->first();
    $id = $user->id;


    $this->validate($request, [
      'message' => 'required|max:50',
      'title' =>  'required|max:250|min:10',
    ]);

    Auth::user()->message()->create([
      'user_id' => $id,
      'message' => $request->input('message'),
      'title' => $request->input('title'),
    ]);

    return redirect()->back();
  }

}
