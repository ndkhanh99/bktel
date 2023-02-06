<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// check student roles
class check_stu
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
        {
            if ( ($user->student_id == null) && ($user->role_id==4))   
            {
                return response() -> view('form_student');
            }
            elseif ($user->role_id == 3)
            {
                return response() -> view ('teacher');
            }
        }
        return $next($request);
    }
}
