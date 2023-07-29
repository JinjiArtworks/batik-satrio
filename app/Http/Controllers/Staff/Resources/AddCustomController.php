<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\Preview;
use App\Models\Teknik;
use Illuminate\Http\Request;

class AddCustomController extends Controller
{
    public function index()
    {
        $custom = Preview::all();
        return view('staff.resources.custom.add', compact('custom'));
    }
    public function store(Request $request)
    {
        if ($request->image != null) {
            $destinationPath = '/images';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            Preview::create([
                'nama' => $request->name,
                'deskripsi' => $request->deskripsi,
                'gambar' => $request->image->getClientOriginalName(),
            ]);
        }
        return redirect('/add-custom')->with('success', 'Resources berhasil ditambahkan');
    }
    public function edit($id)
    {
        $custom = Preview::find($id);
        return view('staff.resources.custom.edit', compact('custom'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/images';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Preview::where('id', $id)
            ->update(
                [
                    'nama' => $request->name,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $request->image->getClientOriginalName(),

                ]
            );
        return redirect('/add-custom')->with('success', 'Resources berhasil diubah');
    }
    public function destroy($id)
    {
        Preview::where('id', $id)->delete();
        return redirect()->back();
    }
}
