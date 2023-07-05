<?php

namespace App\Http\Controllers\Customers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        // return dd($user);
        return view('customers.cart', compact('cart'));
    }
    public function addCart(Request $request, $id)
    {
        $user = Auth::user()->id;
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (!isset($cart[$id])) {
            $cart[$id] = [
                "id" => $product->id,
                "user_id" => $user,
                "name" => $product->nama,
                "image" => $product->gambar,
                "price" => $product->harga,
                "bahan" => $product->bahan,
                "description" => $product->deskripsi,
                "weight" => $product->berat,
                "categories" => $product->categories->nama,
                "motif" => $product->motif->nama,
                "size" => $request->size,
                "quantity" => $request->post('quantity'),
                "total_after_disc" => $product->harga  * $request->post('quantity')
            ];
        } else {
            $cart[$id]["weight"] += $product->berat;
            $cart[$id]["quantity"] += $request->post('quantity');
            $cart[$id]["total_after_disc"] += $request->post('quantity') * $product->harga;
        }
        session()->put('cart', $cart);
        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan kedalam keranjang');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect('/cart')->with('success', 'Keranjang berhasil dihapus!');
    }
}
