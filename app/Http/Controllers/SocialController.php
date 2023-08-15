<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SocialRegister;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    //Google Login
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }

    //Google callback  
    public function handleGoogleCallback(){

        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerorLoginUser($user);
        return redirect()->route('dashboard');
    }

    //Facebook Login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    //facebook callback  
    public function handleFacebookCallback(){

        $user = Socialite::driver('facebook')->stateless()->user();

        $this->_registerorLoginUser($user);
        return redirect()->route('dashboard');
    }

    protected function _registerorLoginUser($data){
        $user = User::where('email', $data->email)->first();

        If(!$user){
            $user = new User();

            $user->name = $data->name;
            $user->email = $data->email;

            $password = Str::random(12);
            $hashedPassword = Hash::make($password);

            $user->password = $hashedPassword;
            $user->provider_id = $data->id;
            $user->save();

            if($data->avatar_original) $user->attachAvatar($data->avatar_original);

            $user->notify(new SocialRegister($password));
        }

        Auth::login($user);
    }
}