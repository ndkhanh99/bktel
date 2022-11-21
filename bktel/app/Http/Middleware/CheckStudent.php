<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        $user = Auth::user();
        if ( $user-> student_id != null || ($user -> role_id !=4  && $user -> role_id != 1)) {
            return $next($request);
        }
        elseif($user -> role_id ==1){ 

            return response()->view('add_mem');
        }
        else{
            return response()->view('after');
        }
  
    }
}
