<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\Teknik;
use Illuminate\Http\Request;

class AddWarnaController extends Controller
{
    public function index()
    {
        $warna = Colors::all();
        return view('staff.resources.warna.add', compact('warna'));
    }
    public function store(Request $request)
    {
        if ($request->image != null) {
            $destinationPath = '/images';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            Colors::create([
                'nama' => $request->name,
                'gambar' => $request->image->getClientOriginalName(),
            ]);
        }
        return redirect('/add-warna')->with('success', 'Resources berhasil ditambahkan');
    }
    public function edit($id)
    {
        $warna = Colors::find($id);
        return view('staff.resources.warna.edit', compact('warna'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/images';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Colors::where('id', $id)
            ->update(
                [
                    'nama' => $request->name,
                    'gambar' => $request->image->getClientOriginalName(),
                ]
            );
        return redirect('/add-warna')->with('success', 'Resources berhasil diubah');
    }
    public function destroy($id)
    {
        Colors::where('id', $id)->delete();
        return redirect()->back();
    }
}
