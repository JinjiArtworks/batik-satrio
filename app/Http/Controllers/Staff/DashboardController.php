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
        // $about = OrderDetail::where('product_id', 'order_id')->first();
        $orderdetails = OrderDetail::where('order_id', $id)->first();
        // $orderdetail = OrderDetail::whereOrderId($id);
        // return dd($orderdetail->product->nama);
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
}
