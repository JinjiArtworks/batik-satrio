<?php

namespace App\Http\Controllers\Customers\Custom;

use App\Models\Colors;
use App\Models\Motif;
// use App\Models\Preview;
use App\Models\Results;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LDAP\Result;

class CustomBatikController extends Controller
{
    public function index()
    {
        $results = Results::all();
        // return dd($results);
        $getColors = Colors::all();
        $getMotifs = Motif::all();
        $getTipe = Tipe::all();
        // $previews = Preview::all();
        // return dd($getMotifs[0]['nama'], '+', $getColors[0]['nama']);
        // return dd($results);
        // return dd($getTipes->gambar);
        // $getColorsValues = Colors::
        // return dd($list);
        return view('customers.custom.index', compact('results', 'getColors', 'getTipe', 'getMotifs'));
    }

    public function details(Request $request)
    {
        $tipe = $request->tipe;
        $motif = $request->motif;
        $metode = $request->metode;
        $uploaded_custom = $request->upload_custom;
        $results = Results::all();
        if ($request->images != null) {
            $images = $request->images->getClientOriginalName();
            return view('customers.custom.custom', compact('motif',  'tipe', 'images', 'metode', 'uploaded_custom'));
        }
        session()->put('list');

        return view('customers.custom.custom', compact('motif',  'tipe', 'results', 'metode', 'uploaded_custom'));
    }
}
