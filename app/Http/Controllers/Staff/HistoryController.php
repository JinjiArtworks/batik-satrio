<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('staff.history.history-order', compact('orders'));
    }
    public function detail($id)
    {
        $orderdetails = OrderDetail::whereOrderId($id)->first(); // already declated a has many from categories, its mean it is beloangsto categories
        return view('staff.history.detail-history', compact('orderdetails'));
    }
    public function update(Request $request, $id)
    {
        // $destinationPath = '/img';
        // $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        // Product::where('id', $id)
        //     ->update(
        //         [
        //             'name' => $request->name,
        //             'image' => $request->image->getClientOriginalName(),
        //             'dimension' => $request->dimension,
        //             'brand' => $request->brand,
        //             'categories_id' => $request->categories,
        //             'stock' => $request->stock,
        //             'price' => $request->price,
        //         ]
        //     );
        // return redirect('/data-product');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back();
    }
}
