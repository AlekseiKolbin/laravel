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
}
