<?php

namespace App\Http\Controllers\Customers;

use App\Models\City;
use App\Models\Ekspedisi;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

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
                "price_grosir" => $product->harga_grosir,
                "minimal_order" => $product->minimal_order,
                "diskon" => $product->diskon,
                "bahan" => $product->bahan,
                "stok" => $product->stok,
                "description" => $product->deskripsi,
                "weight" => $product->berat,
                "categories" => $product->categories->nama,
                "motif" => $product->motif->nama,
                "size" => $request->size,
                "quantity" => $request->quantity,
                "total_after_disc" => ($product->harga - $product->diskon)  * $request->quantity
            ];
        } else {
            if ($cart[$id]['size'] != $request->size) {
                // Kalau sizenya tidak sama, tidak bisa di timbun alias di tambahkan produk baru sesuai dengan request sizenya.
                $cart[$id] = [
                    "id" => $product->id,
                    "user_id" => $user,
                    "name" => $product->nama,
                    "image" => $product->gambar,
                    "price" => $product->harga,
                    "price_grosir" => $product->harga_grosir,
                    "minimal_order" => $product->minimal_order,
                    "diskon" => $product->diskon,
                    "bahan" => $product->bahan,
                    "stok" => $product->stok,
                    "description" => $product->deskripsi,
                    "weight" => $product->berat,
                    "categories" => $product->categories->nama,
                    "motif" => $product->motif->nama,
                    "size" => $request->size,
                    "quantity" => $request->quantity,
                    "total_after_disc" => ($product->harga - $product->diskon)  * $request->quantity
                ];
            } else {
                $cart[$id]["weight"] += $product->berat;
                $cart[$id]["quantity"] += $request->quantity;
                $cart[$id]["total_after_disc"] += ($product->harga - $product->diskon)  * $request->quantity;
            }
        }
        session()->put('cart', $cart);
        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan kedalam keranjang');
    }
    public function index()
    {
        $user = Auth::user();
        $usersProvince = Auth::user()->province_id;
        $usersCity = Auth::user()->city_id;

        $city  = City::whereId($usersCity)->get('name');
            // return dd($city);
        $province  = Province::whereId($usersProvince)->get('name');

        $allProvince = Province::all();
        $allCities = City::all();

        $allEkspedisi = Ekspedisi::all();

        $cart = session()->get('cart');
        return view('customers.cart.cart', compact('cart', 'city', 'allCities', 'allProvince', 'province', 'allEkspedisi','usersProvince','usersCity'));
    }

    public function destroy($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect('/cart')->with('info', 'Produk berhasil dihapus');
    }
    public function update(Request $request)
    {
        // return dd($request->all());
        $user = Auth::user()->id;
        User::where('id', $user)
            ->update(
                [
                    'address' => $request->address,
                    'city_id' => $request->city,
                    'province_id' => $request->province,
                ]
            );
        return redirect()->back()->with('success', 'Alamat berhasil diubah');
    }
}
