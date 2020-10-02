<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
  public function getBook()
  {
    return view('book');
  }

  public function postBook(Request $request)
  {
    $this->validate($request, [
      'text' => 'required|min:20',
      'title' =>  'required|max:75',
    ]);

    Auth::user()->library()->create([
      'text' => $request->input('text'),
      'title' => $request->input('title'),
    ]);

    return redirect()->back();
  }

  public function getChange($id, $userId)
  {
    if (Auth::user()->id == $userId)
    {
      $datas = Library::where('id', $id)->get();
      return view('change', compact('datas'));
    }
    return redirect()->route('main');
  }

  public function postChange(Request $request, $id, $userId)
  {
    $id = $userId;
    $this->validate($request, [
      'text' => 'required|min:20',
      'title' =>  'required|max:75',
    ]);

    Auth::user()->library()->update([
      'text' => $request->input('text'),
      'title' => $request->input('title'),
    ]);

    return redirect()->route('profileBook', compact('id'));
  }
}
