<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('forms.login');
    }
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            if (Auth::user()->active == 0) {
                Auth::logout();
                return redirect()->route('auth.login')->with('no', 'Bạn cần xác thực tài khoản ở email');
            }
            if ($request->has('rememberme')) {
                Cookie::queue('useremail', $request->email, 1440);
                Cookie::queue('userpassword', $request->password, 1440);
            }
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
    }
}
