<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('staff.reports.data-reports', compact('orders'));
    }
    public function detail($id)
    {
        $orderdetails = OrderDetail::whereOrderId($id)->first(); // already declated a has many from categories, its mean it is beloangsto categories
        // return dd($orderdetails->order->harga);
        return view('staff.reports.detail-reports', compact('orderdetails'));
    }
    public function update(Request $request, $id)
    {
        Order::where('id', $id)
            ->update(
                [
                    'status' => 'Pesanan Dikirim',
                ]
            );
        return redirect('/data-reports');
    }
    public function updateCustom(Request $request, $id)
    {
        Order::where('id', $id)
            ->update(
                [
                    'status' => $request->action,
                ]
            );
        return redirect('/data-reports');
    }
}
