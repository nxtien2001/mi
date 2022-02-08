<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function loginFromGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackFromGoogle()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLogin($user);
        return redirect()->route('dashboard');
    }
    public function loginFromFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFromfacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLogin($user);
        return redirect()->route('dashboard');
    }
    public function loginFromGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function callbackFromGithub()
    {
        $user = Socialite::driver('github')->user();
        $this->_registerOrLogin($user);
        return redirect()->route('dashboard');
    }
    protected function _registerOrLogin($data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
        }
        Auth::login($user);
    }
}
