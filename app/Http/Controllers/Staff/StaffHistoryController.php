<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;

class StaffHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('staff.history.history-order', compact('orders'));
    }
}
