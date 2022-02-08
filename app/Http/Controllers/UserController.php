<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function verify($user_id, $token)
    {
        $verify = VerifyUser::where('token', $token)->first();
        if (isset($verify)) {
            DB::table('users')->where('id', $user_id)->update(['active' => 1]);
            return redirect()->route('auth.login')->with('yes', 'Cảm ơn bạn đã xác thực tài khoản! Vui lòng đăng nhập.');
        } else {
            return redirect()->route('auth.login')->with('error', 'Đã gặp sự cố');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
