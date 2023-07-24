<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function returnRequests()
    {
        return view('admin.return.index');
    }

    public function approve(Order $order)
    {
        $order->update(['return_order' => 2]);
        $notification = array(
            'message' => __('Order Return Request Is Approved!'),
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function allReturns()
    {
        return view('admin.return.all_returns');
    }

}
