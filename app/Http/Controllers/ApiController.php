<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tests\Feature\CreateApiTokenTest;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        //kiểm tra đăng nhập
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password, [])) {
            return response()->json([
                'message' => "Tài khoản hoặc mật khẩu không chính xác!"
            ], 404);
        };
        //tạo biến lưu token
        $token = $user->createToken('authToken')->plainText;
        return response()->json([
            'access_token' => $token,
            'type_token' => 'Bearer'
        ], 200);
    }
    public function register(Request $request)
    {
        $message = [
            'name.required' => "Name không được để trống!",
            'email.email' => "Định dạng email không hợp lệ!",
            'email.required' => "Email không được để trống!",
            'password.required' => "Password không được để trống!",
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required',
        ], $message);
        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors()
            ], 404);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response()->json([
            'message' => "Đăng kí thành công!"
        ], 200);
    }
    public function logout()
    {
        // Auth::user()->tokens()->delete();
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => "Đăng xuất thành công!"
        ]);
    }
    public function user(Request $request)
    {
        return $request->user();
    }
}
