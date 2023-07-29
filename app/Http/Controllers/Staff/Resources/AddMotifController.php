<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Categories;
use App\Models\Models;
use App\Models\Motif;
use App\Models\Product;
use App\Models\Teknik;
use Illuminate\Http\Request;

class AddMotifController extends Controller
{
    public function index()
    {
        $motif = Motif::all();
        return view('staff.resources.motif.add', compact('motif'));
    }
    public function store(Request $request)
    {
        // return dd($request->all());
        if ($request->image != null) {
            $destinationPath = '/images';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            Motif::create([
                'nama' => $request->name,
                'gambar' => $request->image->getClientOriginalName(),
            ]);
        }

        return redirect('/add-motif')->with('success', 'Resources berhasil ditambahkan');;
    }
    public function edit($id)
    {
        $motif = Motif::find($id);
        // return dd($models2);
        return view('staff.resources.motif.edit', compact('motif'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/images';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Motif::where('id', $id)
            ->update(
                [
                    'nama' => $request->name,
                    'gambar' => $request->image->getClientOriginalName(),
                ]
            );
        return redirect('/add-motif')->with('success', 'Resources berhasil diubah');
    }
    public function destroy($id)
    {
        Motif::where('id', $id)->delete();
        return redirect()->back();
    }
}
