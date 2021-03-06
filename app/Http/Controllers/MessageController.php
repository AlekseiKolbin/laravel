<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;
use App\Models\Trust;
use Illuminate\Http\Request;

class MessageController extends Controller
{
  public function postMessage(Request $request, $id)
  {

    $user = User::where('id', $id)->first();
    $id = $user->id;


    $this->validate($request, [
      'message' => 'required|max:250|min:10',
      'title' =>  'required|max:50',
    ]);

    Auth::user()->message()->create([
      'user_id' => $id,
      'message' => $request->input('message'),
      'title' => $request->input('title'),
    ]);

    return redirect()->back();
  }

  public function postReply(Request $request, $messageId)
  {
    $this->validate($request, [
      "reply-{$messageId}" => 'required|max:50',
    ]);

    $mes = Message::find($messageId);

    if( !$mes)
    {
      return redirect()->back();
    }

    $reply = new Message();
    $reply->user()->associate(Auth::user());
    $reply->message = $request->input('message');
    $reply->title = $request->input("reply-{$messageId}");
    $mes->replies()->save($reply);

    return redirect()->back();
  }

  public function postDelete(Request $request)
  {
    $mes = Message::find($request->messageId);
    $clean = Message::get()->where('message_id', $request->messageId);
    if(Auth::user()->id == $mes->user_id || Auth::user()->id == $mes->profile_id)
    {
      if(!$clean->isempty())
      {
        $mes->update(['title' => 'Сообщение удалено', 'message' => 'Сообщение удалено']);
      }
      else
      {
        $mes->delete();
      }
    }
    return redirect()->back();
  }

  public function postAccess(Request $request)
  {
    $acsess = Trust::where('trusted_id', $request->bookId)->where('user_id', Auth::user()->id)->get();
    if ($acsess->isEmpty())
    {
      Auth::user()->trust()->create([
        'user_id' => Auth::user()->id,
        'trusted_id' => $request->bookId,
      ]);
      return redirect()->back();
    }
    else
    {
      Auth::user()->trust()->delete([
        'user_id' => Auth::user()->id,
        'trusted_id' => $request->bookId,
      ]);
      return redirect()->back();
    }
  }

  public function ajaxMessages(Request $request)
  {
    $comments = Message::where('user_id', $request->user)->get()->sortByDesc('created_at')->skip(5);
    return view('include.message', ['user' => $request->user, 'datas' => $comments]);
  }
}
