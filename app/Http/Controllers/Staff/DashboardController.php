<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Returns;
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
        $filterPendapatan = Order::where('status', '=', 'Selesai')->orWhere('status','=','Ajuan Pengembalian Ditolak')->get();
        $sumPendapatan = collect($filterPendapatan)->sum('total');
        $totalOngkir = collect($filterPendapatan)->sum('ongkos_kirim');
        $pendapatanBersih = $sumPendapatan - $totalOngkir;

        $getReturns = Order::where('status', '=', 'Proses Pengembalian')->get();
        $totalReturns = $getReturns->count();
        // return dd($totalReturns);
        return view('staff.reports.data-reports', compact('orders', 'totalOrders', 'totalClients', 'pendapatanBersih', 'totalReturns'));
    }
    public function detail($id)
    {
        $orderdetails = OrderDetail::whereOrderId($id)->first(); 
        // $details = OrderDetail::whereOrderId($id)->get(); // already declated a has many from categories, its mean it is beloangsto categories
        // {{ $item->order->status }}

        $returnOrder = Returns::whereOrdersId($id)->first();
        return view('staff.reports.detail-reports', compact('orderdetails','returnOrder'));
    }
    public function update(Request $request, $id)
    {
        Order::where('id', $id)
            ->update(
                [
                    'status' => 'Pesanan Dikirim',
                ]
            );
        return redirect('/data-reports')->with('success', 'Pesanan Berhasil Dikirim');
    }
    public function updateReturn(Request $request, $id)
    {
        Order::where('id', $id)
            ->update(
                [
                    'status' => $request->action,
                ]
            );
        return redirect('/data-reports')->with('success', 'Status Pesanan Berhasil Diubah');
    }
}
