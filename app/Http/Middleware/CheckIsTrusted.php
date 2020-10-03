<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Trust;
use App\Models\Library;

use Closure;
use Illuminate\Http\Request;

class CheckIsTrusted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if (Auth::guest())
      {
        return redirect()->route('main');
      }
      $user = Auth::user()->id;
      $trust = Trust::get()->where('trusted_id', $user);
      if (sizeof($trust))
      {
        return $next($request);
      }
      else
      {
        return redirect()->route('main');
      }
    }
}
