<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = Auth::user()->id;

        // Total Pesanan
        $getOrders = Order::where('users_id', '<=', $users)->get();
        $totalOrders = $getOrders->count();

        // Total Clients
        $getClients = DB::table('orders')
            ->select('users_id')
            ->groupBy('users_id')
            ->get();
        $totalClients = $getClients->count();

        // Total Orders
        $filterPendapatan = Order::where('status', '=', 'Selesai')->get();
        $sumPendapatan = collect($filterPendapatan)->sum('total');
        $totalOngkir = collect($filterPendapatan)->sum('ongkos_kirim');
        $pendapatanBersih = $sumPendapatan - $totalOngkir;

        $getReturns = Order::where('status', '<=', 'Menunggu Konfirmasi Penjual')->get();
        $totalReturns = $getReturns->count();
        // return dd($totalReturns);
        return view('staff.reports.data-reports', compact('orders', 'totalOrders', 'totalClients','pendapatanBersih','totalReturns'));
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
