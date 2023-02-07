<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;

class AdminProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    { 
        return view('admin.body.update_profile', [
            'request' => $request,
            'admin' => $request->user(),
        ]);
    }

    public function changePass()
    {
        return view('admin.auth.change-password');
    }

    public function updatePass(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPass = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPass)) {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Is Changed Successfully!',
                'alert-type' => 'success',
            );

            return redirect()->route('admin.login')->with($notification);
        } else {
            $notification = array(
                'message' => 'Current Password Is Invalid.',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function adminUpdateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $admin = Admin::find(Auth::user()->id);
       
        if($admin) {
        $old_image = $request->old_image;
        $admin_image = $request->file('admin_image');

        if($admin_image) {
        $name_gen = hexdec(uniqid()).'.'.$admin_image->getClientOriginalExtension();
        $last_img = 'profile-photos/'.$name_gen;
        Image::make($admin_image)->fit(400,400)->save('storage/'.$last_img);

        if(file_exists($old_image)) unlink('storage/'.$old_image);

        $admin->profile_photo_path = $last_img; 
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        $notification = array(
            'message' => 'Admin Profile Is Updated Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
       } else {
        return redirect()->back();
       }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);
    }
}
