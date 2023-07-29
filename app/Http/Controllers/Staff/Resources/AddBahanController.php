<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Models;
use Illuminate\Http\Request;

class AddBahanController extends Controller
{
    public function index()
    {
        $bahan = Bahan::all();
        return view('staff.resources.bahan.add', compact('bahan'));
    }
    public function store(Request $request)
    {

        Bahan::create([
            'nama' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/add-bahan')->with('success', 'Resources berhasil ditambahkan');;
    }
    public function edit($id)
    {
        $bahan = Bahan::find($id);
        return view('staff.resources.bahan.edit', compact('bahan'));
    }
    public function update(Request $request, $id)
    {

        Bahan::where('id', $id)
            ->update(
                [
                    'nama' => $request->name,
                    'deskripsi' => $request->deskripsi,
                ]
            );
        return redirect('/add-bahan')->with('success', 'Resources berhasil diubah');
    }
    public function destroy($id)
    {
        Bahan::where('id', $id)->delete();
        return redirect()->back();
    }
}
