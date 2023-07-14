<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        // return dd($products);
        return view('customers.products.shop', compact('products'));
    }
    public function detail($id)
    {
        $products = Product::find($id);
        $wishlist = Wishlist::whereProductsId($id)->get();
        // $getIdProducts = $products->id;
        return view('customers.products.detailproduct', compact('products','wishlist'));
    }

    public function store(Request $request)
    {
        // Send into Wishlist
        $user = Auth::user()->id;
        $product = Wishlist::create([
            'users_id' => $user,
            'products_id' => $request->products,
        ]);
        return redirect('/wishlist');
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
        //
    }
}
