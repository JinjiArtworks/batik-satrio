<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Motif;
use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('staff.products.data-products', compact('products'));
    }
    // Add products
    public function create()
    {
        $product = Product::all();
        $categories = Categories::all();
        $motif = Motif::all();
        // return dd($categories);
        return view('staff.products.create', compact('product', 'categories','motif'));
    }
    public function store(Request $request)
    {
        // return dd($request->all());
        if ($request->image != null) {
            $destinationPath = '/images';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            $product = Product::create([
                'categories_id' => $request->categories,
                'motif_id' => $request->motif,
                'nama' => $request->name,
                'gambar' => $request->image->getClientOriginalName(),
                'deskripsi' => $request->description,
                'harga' => $request->price,
                'terjual' => 0,
                'stok' => $request->stock,
                'diskon' => $request->discount,
                // 'harga_grosir' => default_null
                'model' => $request->model,
                'ukuran' => $request->size,
                'berat' => 350,
                'teknik' => $request->teknik,
                'bahan' => $request->bahan,
            ]);
        }
        return redirect('/data-product');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('staff.products.edit', compact('product', 'jenis', 'categories', 'tipe'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/img';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Product::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'image' => $request->image->getClientOriginalName(),
                    'dimension' => $request->dimension,
                    'brand' => $request->brand,
                    'categories_id' => $request->categories,
                    'stock' => $request->stock,
                    'price' => $request->price,
                ]
            );
        return redirect('/data-product');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back();
    }
}
