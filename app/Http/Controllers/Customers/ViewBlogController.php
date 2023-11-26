<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class ViewBlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('customers.sejarah.index', compact('blog'));
    }
}
