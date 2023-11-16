<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminAndTeacher 
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
            if ( Auth()->check() && (($user->role_id==1) || ($user->role_id==3)))// chpo phep admin va teacher co the vao view  
            {   
                return $next($request);
            }
        }
            return redirect('/home')->with('error', 'Chỉ có Admin hoặc Teacher mới được quyền sử dụng tính năng này');
    }
}