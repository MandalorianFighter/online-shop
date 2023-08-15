<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdatePassRequest;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetails;
use App\DataTables\UserOrdersDataTable;
use App\DataTables\OrderReturnDataTable;
use Illuminate\Support\Facades\Auth;
use DB;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UserController extends Controller
{

    public function dashboard(UserOrdersDataTable $dataTable)
{
    return $dataTable->render('dashboard');
}

    public function viewOrder(Order $order)
    {
        $shipping = DB::table('shipping')->where('order_id', $order->id)->first();
        $details = OrderDetails::with('product')->where('order_id', $order->id)->get();
        return view('pages.view_order', compact('order', 'shipping', 'details'));
    }

    public function orderTracking(Request $request)
    {
        $track = Order::where('status_code', $request->status_code)->first();
        
        if($track) {
            return view('pages.tracking', compact('track'));
        } else {
            $notification = array(
                'message' => __('Status Code Is Invalid!'),
                'alert-type' => 'error'
            );
    
            return redirect()->route('dashboard')->with($notification);
        }
    }

    public function changePass()
    {
        return view('auth.change-password');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->except(['avatar']));

        if($request->hasFile('avatar')) 
        {
            $user->updateAvatar($request->file('avatar'));
        }

        $notification = array(
            'message' => __('User Info Is Updated Successfully!'),
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
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

    public function editProfile()
    {
        return view('profile.edit');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => __('Successfully Logout!'),
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);
    }

    public function listSuccess(OrderReturnDataTable $dataTable)
    {
        return $dataTable->render('pages.return_order');
        // $orders = Order::where('user_id', auth()->id())
        // ->where('status', 3)
        // ->orderBy('id', 'desc')
        // ->take(10)
        // ->get();
        // return view('pages.return_order', compact('orders'));
    }

    public function orderReturn(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->update(['return_order' => 1]);
        $notification = array(
            'message' => __('Order Return Request Is Done!'),
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}




