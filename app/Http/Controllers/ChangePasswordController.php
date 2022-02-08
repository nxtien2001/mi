<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.forms.changePassword');
    }
    public function submitChangePasswordForm(ChangePasswordRequest $request)
    {
        $hashedPass = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPass)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('auth.login')->with('change', 'Thay đổi mật khẩu thành công! Vui lòng đăng nhập bằng mật khẩu mới.');
        } else {
            return redirect()->back()->with('error', 'Thông tin bạn nhập chưa chính xác!');
        }
    }
}
