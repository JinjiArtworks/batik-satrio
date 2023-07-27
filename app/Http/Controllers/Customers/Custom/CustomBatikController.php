<?php

namespace App\Http\Controllers\Customers\Custom;

use App\Models\Colors;
use App\Models\Motif;
use App\Models\Preview;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomBatikController extends Controller
{
    public function index()
    {
        $list = session()->get('list');
        return view('customers.custom.index', compact('list'));
    }
    public function check(Request $request, $id)
    {
        // return dd($list);
        $colors = Colors::all();
        $motif = Motif::all();
        $gender = $request->gender;
        $gender_id = $request->gender_id;
        $previews = Preview::all();
        // return dd($previews);
        return view('customers.custom.custom-check', compact('gender', 'gender_id', 'colors', 'motif', 'previews'));
    }
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

    public function details(Request $request, $id)
    {
        // return dd($list);
        $gender = $request->gender;
        $motif = $request->motif; //masukkan kedalam session list
        $warna = $request->warna; //masukkan kedalam session list
        // $images = $request->images; //masukkan kedalam session list
        $images = Preview::where('nama', 'LIKE', '%' . $warna . '%')->orWhere('nama', 'LIKE', '%' . $motif . '%')->first('gambar'); // kalo begini, akan menampilkan hasil dari salah satu yang diinputkan, dan seperti fitur rekomendasi saja _'_
        // return dd($images);
        $getImages = $images->gambar;
        $gender_id = $request->gender_id;
        // return dd($request->all());
        return view('customers.custom.custom', compact('gender', 'gender_id', 'motif', 'warna', 'getImages'));
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
