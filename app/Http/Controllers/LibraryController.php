<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\User;
use App\Models\Trust;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
  public function getProfileBook($id)
  {
    $trust = Trust::get();
    $user = User::where('id', $id)->first();
    if (Auth::user()->id == $user->id)
    {
      $datas = Library::where('profile_id', $user->id)->get()->sortByDesc('created_at');
      if (!$user)
      {
        abort(404);
      }
      return view('library', compact('user', 'datas', 'trust'));
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
      $hslink = password_hash(mt_rand(2, 5), PASSWORD_DEFAULT);
      Library::first()->where('id', $id)->update(['link' => $hslink]);
      return view('read', compact('datas', 'hslink'));
    }
    return redirect()->route('main');
  }
  public function trustRead($id, $userId, $user)
  {
    if ($user != NULL)
    {
      $datas = Library::where('id', $id)->get();
      return view('read', compact('datas'));
    }
    return redirect()->route('main');
  }
  public function trustBook()
  {
    $trustbook = Trust::where('trusted_id', Auth::user()->id)->get();
    $books = Library::all();
    return view('trust', compact('trustbook', 'books'));

  }
  public function getShare($link)
  {
    if (Auth::guest())
    {
      $datas = Library::where('link', $link)->get();
      return view('share', compact('datas'));
    }
  }
}
