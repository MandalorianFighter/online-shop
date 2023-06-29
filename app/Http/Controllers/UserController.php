<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdatePassRequest;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetails;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UserController extends Controller
{

    public function dashboard()
    {
        $orders = Order::where('user_id', auth()->id())
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();
        return view('dashboard', compact('orders'));
    }

    public function viewOrder(Order $order)
    {
        $shipping = DB::table('shipping')->where('order_id', $order->id)->first();
        $details = OrderDetails::with('product')->where('order_id', $order->id)->get();
        return view('pages.view_order', compact('order', 'shipping', 'details'));
    }

    public function changePass()
    {
        return view('auth.change-password');
    }

    public function updatePass(UpdatesUserPasswords $updater, UpdatePassRequest $request, User $user)
    {
        $updater->update($user, $request->only(['current_password', 'password', 'password_confirmation']));
        Auth::guard('web')->logout();

        $notification = array(
            'message' => __('Password Is Changed Successfully!'),
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $notification = array(
            'message' => __('Successfully Logout!'),
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);
    }
}