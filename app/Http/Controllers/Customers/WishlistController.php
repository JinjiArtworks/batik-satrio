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
        $user = Auth::user()->id;
        $wishlist = Wishlist::whereUsersId($user)->get(); // already declated a has many from categories, its mean it is beloangsto categories\
        // return dd($wishlist);
        return view('customers.profile.wishlist', compact('wishlist'));
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
