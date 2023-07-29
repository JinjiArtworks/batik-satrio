<?php

namespace App\Http\Controllers\Customers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Returns;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $orders = Order::whereUsersId($user)->get(); // already declated a has many from categories, its mean it is beloangsto categories\
        // return dd($orders);
        return view('customers.history.history-order', compact('orders'));
    }
    public function detail($id)
    {
        $details = OrderDetail::whereOrderId($id)->get(); // already declated a has many from categories, its mean it is beloangsto categories
        // return dd($details);
        $detailStatus = OrderDetail::whereOrderId($id)->first(); // already declated a has many from categories, its mean it is beloangsto categories
        $getId = $id;
        $reviews = Review::all();
        $mytime = Carbon::now()->today()->toDateTimeString();
        // return dd($mytime);
        // $NewDate = Date('Y-m-d', strtotime('+3 days'));
        // return dd($NewDate);
        // return dd($details->order->tanggal);
        // return dd($mytime);
        // $test = OrderDetail::whereOrderId($id)->get('price'); // already declated a has many from categories, its mean it is beloangsto categories
        // $sumPendapatan = collect($details)->sum('price');
        // return dd($details);
        return view('customers.history.history-detail', compact('details', 'getId', 'reviews', 'mytime', 'detailStatus'));
    }

    public function store(Request $request, $id)
    {
        $user = Auth::user()->id;
        $product = Review::create([
            'users_id' => $user,
            'products_id' => $id,
            'tanggal' => Carbon::now(),
            'komentar' => $request->comment,
            'rating' => $request->rating
        ]);
        return redirect('history-order');
    }
    public function storeReturns(Request $request, $id)
    {
        // return dd($request->all());

        if ($request->bukti != null) {
            $destinationPath = '/images';
            $request->bukti->move(public_path($destinationPath), $request->bukti->getClientOriginalName());
            $returns = Returns::create([
                'orders_id' => $request->order_id,
                'tanggal' => Carbon::now(),
                'alasan' => $request->alasan,
                'bukti' => $request->bukti->getClientOriginalName(),

            ]);
            Order::where('id', $id)
                ->update(
                    [
                        'status' => 'Proses Pengembalian'
                    ]
                );
            // return dd($returns);

        }
        return redirect('history-order');
    }
    public function storeReturnsBack($id)
    {
        Order::where('id', $id)
            ->update(
                [
                    'status' => 'Pesanan Dikirim Balik Kepada Penjual'
                ]
            );
        return redirect('history-order');
    }
    public function acceptOrder($id)
    {
        $mytime = Carbon::now()->today()->toDateTimeString();
        Order::where('id', $id)
            ->update(
                [
                    'status' => 'Selesai',
                    'updated_at' => $mytime
                ]
            );
        return redirect('history-order');
    }
    public function remove($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    }
}
