<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
  public function getProfileBook($id)
  {
    $user = User::where('id', $id)->first();
    if (Auth::user()->id == $user->id)
    {
      $datas = Library::where('profile_id', $user->id)->get()->sortByDesc('created_at');
      if (!$user)
      {
        abort(404);
      }
      return view('library', compact('user', 'datas'));
    }
    return redirect()->route('main');
  }
  public function postDelete(Request $request)
  {
    $book = Library::find($request->bookId);
    if(Auth::user()->id == $book->profile_id)
    {
      $book->delete();
    }
    return redirect()->back();
  }
  public function getRead($id, $userId)
  {
    if (Auth::user()->id == $userId) 
    {
      $datas = Library::where('id', $id)->get();
      return view('read', compact('datas'));
    }
    return redirect()->route('main');
  }

  // public function postChange(Request $request)
  // {
  //   $book = Library::find($request->bookId);
  //   if(Auth::user()->id == $book->profile_id)
  //   {
  //     $book->update(['title' => $request->input('title'), 'text' => $request->input('text')]);
  //   }
  //   return redirect()->back()
  // }
}
