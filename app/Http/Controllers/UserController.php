<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdatePassRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UserController extends Controller
{

    public function changePass()
    {
        $user = Auth::user();
        return view('auth.change-password', compact('user'));
    }

    public function updatePass(UpdatesUserPasswords $updater, UpdatePassRequest $request)
    {
        $updater->update(auth()->user(), $request->only(['current_password', 'password', 'password_confirmation']));
        Auth::guard('web')->logout();

        $notification = array(
            'message' => 'Password Is Changed Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);
    }
}