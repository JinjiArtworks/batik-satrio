<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Jenis;
use App\Models\Product;
use App\Models\Tipe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('staff.reports.data-reports', compact('product'));
    }
    public function edit($id)
    {
        // $product = Product::find($id);
        // $categories = Categories::all();
        // return view('staff.products.edit', compact('product', 'jenis', 'categories', 'tipe'));
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
