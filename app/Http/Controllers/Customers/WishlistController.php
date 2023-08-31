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
        $getWishlist = Wishlist::Select(
            "wishlists.products_id"
        )
            ->groupBy('products_id')
            ->where('users_id', '=', $user)
            ->get();
        return view('customers.profile.wishlist', compact('getWishlist'));
    }
    public function destroy(Request $request)
    {
        Wishlist::where('products_id', $request->products)->delete();
        return redirect()->back();
    }
}
