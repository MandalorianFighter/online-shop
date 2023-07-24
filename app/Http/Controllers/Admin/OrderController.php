<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Models\User;
use App\Models\Admin\Order;
use App\Models\Admin\OrderDetails;
use DB;

class OrderController extends Controller
{
    public function newOrders()
    {
        return view('admin.order.pending');
    }

    public function viewOrder(Order $order)
    {
        $shipping = DB::table('shipping')->where('order_id', $order->id)->first();
        $details = OrderDetails::with('product')->where('order_id', $order->id)->get();
        return view('admin.order.view_order', compact('order', 'shipping', 'details'));
    }

    public function acceptPayment(Order $order)
    {
        $order->update(['status' => 1]);
        $notification = array(
            'message' => __('Payment Is Accepted!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admin.new_orders')->with($notification);
    }

    public function cancelPayment(Order $order)
    {
        $order->update(['status' => 4]);
        $notification = array(
            'message' => __('Order Is Canceled!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admin.new_orders')->with($notification);
    }

    public function acceptPaymentOrders()
    {
        return view('admin.order.accept_payment');
    }

    public function canceledOrders()
    {
        return view('admin.order.canceled');
    }

    public function processDeliveryOrders()
    {
        return view('admin.order.process_delivery');
    }

    public function deliverySuccessOrders()
    {
        return view('admin.order.delivery_success');
    }

    public function processDelivery(Order $order)
    {
        $order->update(['status' => 2]);
        $notification = array(
            'message' => __('Order Is Sent To Delivery!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admin.accept_payment_orders')->with($notification);
    }

    public function deliverySuccess(Order $order)
    {
        $orderProducts = OrderDetails::where('order_id', $order->id)->get();
        $productIds = $orderProducts->pluck('product_id')->toArray();

        $products = Product::whereIn('id', $productIds)->get();
        foreach($orderProducts as $item) {
            $product = $products->firstWhere('id', $item->product_id);
            $product->decrement('quantity', $item->qty);
        }
        $order->update(['status' => 3]);
        $notification = array(
            'message' => __('Order Is Delivered Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admin.delivery_success_orders')->with($notification);
    }

    public function dashboard()
    {
        $today = date('d-m-y');
        $todayTotal = Order::where('date', $today)->sum('total');
        $month = date('F');
        $monthTotal = Order::where('month', $month)->sum('total');
        $year = date('Y');
        $yearTotal = Order::where('year', $year)->sum('total');
        $todayDelivered = Order::where('date', $today)->where('status', 3)->sum('total');

        $returnTotal = Order::where('return_order', 2)->sum('total');

        $productsCount = Product::count();
        $brandsCount = Brand::count();
        $usersCount = User::count();
        return view('admin.dashboard', compact('todayTotal', 'monthTotal', 'yearTotal', 'todayDelivered', 'returnTotal', 'productsCount', 'brandsCount', 'usersCount'));
    }
}

