<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckBanned
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
     if(Auth::check() && Auth::user()->status)
     {
       $banned = Auth::user()->status == "1";
       Auth::logout();

      if($banned == 1 )
      {
          $message="Your Account is suspended, please contact Admin.";
      }
      return redirect()->route('login')
      ->with('status',$message)
      ->withErrors(['email'=>'Your Account is suspended, please contact Admin.']);
     }

 
     return $next($request);
    }
}
