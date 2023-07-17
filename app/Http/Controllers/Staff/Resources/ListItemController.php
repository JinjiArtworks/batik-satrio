<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;

class ListItemController extends Controller
{
    public function index()
    {
        return view('staff.resources.index');
    }
}
