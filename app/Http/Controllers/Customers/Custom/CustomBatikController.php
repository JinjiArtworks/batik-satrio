<?php

namespace App\Http\Controllers\Customers\Custom;

use App\Models\Colors;
use App\Models\Motif;
use App\Models\Preview;
use App\Models\Results;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LDAP\Result;

class CustomBatikController extends Controller
{
    public function index()
    {
        $list = session()->get('list');
        $results = Results::all();
        $getColors = Colors::all();
        $getMotifs = Motif::all();
        $getTipe = Tipe::all();
        $previews = Preview::all();
        // return dd($getMotifs[0]['nama'], '+', $getColors[0]['nama']);
        // return dd($results);
        // return dd($getTipes->gambar);
        // $getColorsValues = Colors::
        // return dd($list);
        return view('customers.custom.index', compact('results', 'getColors', 'getTipe', 'getMotifs', 'previews'));
    }
    // public function checkResults(Request $request)
    // {
    //     $getWarna = $request->warna;
    //     $getMotif = $request->motif;
    //     $colors = Colors::whereNama($getWarna)->first();
    //     $motif = Motif::whereNama($getMotif)->first();
    //     $results = Results::all();
    //     $gender = $request->gender;
    //     $gender_id = $request->gender_id;
    //     // return dd($previews);
    //     return view('customers.custom.custom-results', compact('gender', 'gender_id', 'colors', 'motif', 'results'));
    // }
    // public function results(Request $request, $id)
    // {
    //     // to showing the results based on the rquest!
    //     $getMotif = $request->motif; //masukkan kedalam session list
    //     $getWarna = $request->warna; //masukkan kedalam session list
    //     // $previews = Preview::whereId($getMotif)->get();
    //     $colors = Colors::whereId($getWarna)->first();
    //     $motif = Motif::whereId($getMotif)->first();

    //     $previews = Preview::where('nama', 'LIKE', '%' . $colors->nama . '%')->orWhere('nama', 'LIKE', '%' . $motif->nama . '%')->get('gambar'); // kalo begini, akan menampilkan hasil dari salah satu yang diinputkan, dan seperti fitur rekomendasi saja _'_
    //     return $previews;
    //     // session()->put('list', $previews);
    //     // return redirect()->back();
    //     // if ($getWarna == $getMotif) // 1:1
    //     //     // return $previews;
    //     //     return $previews;
    //     // else
    //     //     foreach ($colors as $c) {
    //     //         foreach ($motif as $m) {
    //     //         }
    //     //     }
    //     // if ($motif == )
    // }

    public function details(Request $request)
    {
        $tipe = $request->tipe;
        $motif = $request->motif; //masukkan kedalam session list
        $warna = $request->warna; //masukkan kedalam session list
        // $images = $request->images; //masukkan kedalam session list

        // $images = Preview::where('nama', 'LIKE', '%' . $warna . '%')->orWhere('nama', 'LIKE', '%' . $motif . '%')->first('gambar'); // kalo begini, akan menampilkan hasil dari salah satu yang diinputkan, dan seperti fitur rekomendasi saja _'_
        $results = Results::all();
        foreach ($results as $item) {
            if ($tipe == $item->tipe && $motif == $item->motif && $warna == $item->warna) {
                $results2 = $item->results_images;
            }
        }
        session()->put('list');

        return view('customers.custom.custom', compact('motif', 'warna', 'tipe', 'results2'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
