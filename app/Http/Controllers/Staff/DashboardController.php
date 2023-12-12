<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Returns;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $orders = Order::all();
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
        $orders = Order::when(
            $request->filter_status !=  null,
            function ($q) use ($request) {
                return $q->where('status', '=', $request->filter_status);
            },
            function ($q) use ($request) {
                return $q->whereBetween('tanggal',[ $request->start_date, $request->end_date ]);
            },
        )->get();
        // $startDate = $request->start_date;
        // $endDate = $request->end_date;
        // if ($startDate && $endDate !=  null) {
        //     $orders = Order::where('tanggal', '=>', $startDate)
        //         ->orWhere('tanggal', '=<', $endDate)
        //         ->get();
        // }
        // $products = Product::when(
        //     $request->filter_alergi !=  null,
        //     function ($q) use ($request) {
        //         return $q->where('alergi_id', '!=', $request->filter_alergi);
        //     },
        //     // // for second select
        //     // function ($q) use ($request) {
        //     //     return $q->where('harga', $request);
        //     // }
        // )->when(
        //     $request->filter2 !=  null,
        //     function ($q) use ($request) {
        //         if ($request->filter2 == 'Termurah') {
        //             return $q->orderBy('harga', 'asc');
        //         } else if ($request->filter2 == 'Termahal') {
        //             return $q->orderBy('harga', 'desc');
        //         } else if ($request->filter2 == 'Terlaris') {
        //             return $q->orderBy('terjual', 'desc');
        //         } else if ($request->filter2 == 'BestRating') {
        //             return $q->orderBy('jumlah_penilaian', 'desc');
        //         }
        //     },
        // )->get();

        // $orders = Order::where('status', '=', $request->filter_status)->get();
        // dd($filterStatus);
        // Total Orders

        $filterPendapatan = Order::where('status', '=', 'Selesai')->orWhere('status', '=', 'Ajuan Pengembalian Ditolak')->get();
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
        $orderdetails = OrderDetail::whereOrderId($id)->get();
        $customDetails = OrderDetail::whereOrderId($id)->first();
        // $details = OrderDetail::whereOrderId($id)->get(); // already declated a has many from categories, its mean it is beloangsto categories
        // {{ $item->order->status }}
        $returnOrder = Returns::whereOrdersId($id)->first();
        return view('staff.reports.detail-reports', compact('orderdetails', 'returnOrder', 'customDetails'));
    }
    public function update($id)
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
                    'status' => $request->action
                ]
            );
        return redirect('/data-reports')->with('success', 'Status Pesanan Berhasil Diubah');
    }
    public function updateCustom(Request $request, $id)
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
