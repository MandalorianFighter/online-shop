<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order;

class ReportController extends Controller
{
    public function todayOrders()
    {
        return view('admin.report.today_orders');
    }

    public function todayDeliveries()
    {
        return view('admin.report.today_deliveries');
    }

    public function thisMonth()
    {
        return view('admin.report.this_month');
    }

    public function filter()
    {
        return view('admin.report.filter');
    }
}
