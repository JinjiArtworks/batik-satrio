<?php

namespace App\Http\Controllers\Customers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); // already declated a has many from categories, its mean it is beloangsto categories
        // return dd($products);
        $categories = Categories::all();
        // return dd($categories);
        return view('customers.dashboard', compact('products', 'categories'));
    }
    
}
