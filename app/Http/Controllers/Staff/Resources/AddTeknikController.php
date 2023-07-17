<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Teknik;
use Illuminate\Http\Request;

class AddTeknikController extends Controller
{
    public function index()
    {
        $teknik = Teknik::all();
        return view('staff.resources.teknik.add', compact('teknik'));
    }
    public function store(Request $request)
    {

        Teknik::create([
            'nama' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/add-teknik');
    }
    public function edit($id)
    {
        $teknik = Teknik::find($id);
        return view('staff.resources.teknik.edit', compact('teknik'));
    }
    public function update(Request $request, $id)
    {

        Teknik::where('id', $id)
            ->update(
                [
                    'nama' => $request->name,
                    'deskripsi' => $request->deskripsi,
                ]
            );
        return redirect('/add-teknik');
    }
    public function destroy($id)
    {
        Teknik::where('id', $id)->delete();
        return redirect()->back();
    }
}
