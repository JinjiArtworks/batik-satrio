<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Returns;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function index()
    {
        // $orders = Order::whereStatus('Menunggu Konfirmasi Penjual')->get();
        $ordersConfirm = Order::whereStatus('Pesanan Dikirim Balik Kepada Penjual')->get();
        return view('staff.return.index', compact('ordersConfirm'));
    }
    public function update(Request $request, $id)
    {
        Order::where('id', $id)
            ->update(
                [
                    'status' => $request->status
                ]
            );
        return redirect('/data-return');
    }
    public function confirmReturn($id)
    {
        $getAllProduct = OrderDetail::whereOrderId($id)->first();
        $getProductId = $getAllProduct->product_id;

        $getAllQty = OrderDetail::whereOrderId($id)->first();
        $getQty = $getAllQty->quantity;

        if ($getProductId != null) {
            $getAllStock = Product::whereId($getProductId)->first();
            $getStok = $getAllStock->stok;

            $getAllTerjual = Product::whereId($getProductId)->first();
            $getTerjual = $getAllTerjual->terjual;
        }


        // return dd($getTerjual);
        if ($getProductId != null) {
            Product::where('id', $getProductId)
                ->update(
                    [
                        'stok' => $getStok + $getQty,
                        'terjual' => $getTerjual - $getQty,
                    ]
                );
            Order::where('id', $id)->delete();
        } else {
            Order::where('id', $id)
                ->update(
                    [
                        'status' => 'Pengembalian Diterima Penjual'
                    ]
                );
            Order::where('id', $id)->delete();
        }

        return redirect('/data-return');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back();
    }
}
