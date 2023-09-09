<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cat = Categories::all();
        return view('customers.products.shop', compact('products', 'cat'));
    }
    public function detail($id)
    {
        $products = Product::find($id);
        $reviews = Review::whereProductsId($id)->first();
        // return dd($reviews);
        $wishlist = Wishlist::whereProductsId($id)->get();
        // return dd($products->id);
        // $getIdProducts = $products->id;
        return view('customers.products.detailproduct', compact('products', 'wishlist','reviews'));
    }

    public function store(Request $request)
    {
        // Send into Wishlist
        $user = Auth::user()->id;
        $product = Wishlist::create([
            'users_id' => $user,
            'products_id' => $request->products,
        ]);
        return redirect('/wishlist')->with('success', 'Produk berhasil ditambahkan kedalam wishlist');
    }

    public function search(Request $request)
    {
        $cat = Categories::all();
        if ($request->has('search')) {
            $products = Product::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $products = Product::get();;
        }
        return view('customers.products.shop', compact('products', 'cat'));
    }
    public function topupSaldo(Request $request)
    {
        $user = Auth::user()->id;
        $userSaldo = Auth::user()->saldo;
        User::where('id', $user)
            ->update(
                [
                    'saldo' => $userSaldo + $request->nominal,
                ]
            );
        return redirect('/')->with('success','saldo berhasil ditambahkan');
    }
    // public function searchByCat(Request $request)
    // {
    //     $cat = Categories::all();
    //     if ($request->has('cat')) {
    //         $products = Product::where('categories_id', 'LIKE', '%' . $request->cat . '%')->paginate(5);
    //     } else {
    //         $products = Product::paginate(5);
    //     }
    //     return view('customers.products.shop', compact('products','cat'));
    // }
}
