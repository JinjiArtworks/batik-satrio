<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Categories;
use App\Models\Models;
use App\Models\Motif;
use App\Models\Product;
use App\Models\Teknik;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('staff.products.data-products', compact('products'));
    }
    public function details($id)
    {
        $products = Product::whereId($id)->first();
        return view('staff.products.detail-products', compact('products'));
    }
    // Add products
    public function create()
    {
        $product = Product::all();
        $categories = Categories::all();
        $motif = Motif::all();
        $models = Models::all();
        $bahan = Bahan::all();
        $teknik = Teknik::all();
        // return dd($categories);
        return view('staff.products.create', compact('product', 'categories', 'motif', 'models', 'bahan', 'teknik'));
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
                'harga_grosir' => $request->price_grosir,
                'minimal_order' => $request->minimal_order,
                'ukuran' => $request->size,
                'berat' => 350,
                'model_id' => $request->model,
                'teknik_id' => $request->teknik,
                'bahan_id' => $request->bahan,
            ]);
        }
        return redirect('/data-product')->with('success', 'Product berhasil ditambahkan');
    }
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Categories::all();
        $motif = Motif::all();
        $models = Models::all();
        $bahan = Bahan::all();
        $teknik = Teknik::all();
        return view('staff.products.edit', compact('products', 'categories', 'motif', 'models', 'bahan', 'teknik'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/images';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Product::where('id', $id)
            ->update(
                [
                    'categories_id' => $request->categories,
                    'motif_id' => $request->motif,
                    'nama' => $request->name,
                    'gambar' => $request->image->getClientOriginalName(),
                    'deskripsi' => $request->description,
                    'harga' => $request->price,
                    'terjual' => 0,
                    'stok' => $request->stock,
                    'diskon' => $request->discount,
                    'harga_grosir' => $request->price_grosir,
                    'minimal_order' => $request->minimal_order,
                    'model_id' => $request->model,
                    'teknik_id' => $request->teknik,
                    'bahan_id' => $request->bahan,
                    'ukuran' => $request->size,
                    'berat' => 350,
                ]
            );
        return redirect('/data-product')->with('success', 'Product berhasil diubah.');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product berhasil dihapus.');
    }
}
