<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResignterController extends Controller
{
    public function getRegister()
    {
        return view('forms.register');
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        VerifyUser::create([
            'token' => Str::random(100),
            'user_id' => $user->id
        ]);
        Mail::to($user->email)->send(new VerifyEmail($user));
        return redirect()->route('auth.login')->with('message', 'Vui lòng xác thực ở email!');
    }
}
