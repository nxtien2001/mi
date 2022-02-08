<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyUserMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('no', 'Vui lòng đăng nhập hệ thống');
        } elseif (Auth::user()->active == 0) {
            Auth::logout();
            return redirect()->route('auth.login')->with('fail', 'Tài khoản của bạn chưa được kích hoạt');
        }
        return $next($request);
    }
}
