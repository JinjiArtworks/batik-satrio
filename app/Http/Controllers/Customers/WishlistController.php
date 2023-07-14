<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::all(); // already declated a has many from categories, its mean it is beloangsto categories\
        // return dd($wishlist->users->name);
        return view('customers.wishlist.wishlist', compact('wishlist'));
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
    public function destroy(Request $request)
    {
        Wishlist::where('products_id', $request->products)->delete();
        return redirect()->back();
    }
}
