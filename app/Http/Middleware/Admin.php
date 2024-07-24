<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = session::get('user');
        if($user->role === 1){
            return $next($request);
         }else{
            Session::flash('not_admin', "Bạn phải đăng nhập bằng tài khoản Admin mới có thể đăng nhập");
            return redirect()->route('login');
         } 
    }
}
