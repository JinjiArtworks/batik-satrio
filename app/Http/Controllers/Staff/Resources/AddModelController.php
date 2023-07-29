<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Categories;
use App\Models\Models;
use App\Models\Motif;
use App\Models\Product;
use App\Models\Teknik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AddModelController extends Controller
{
    public function index()
    {
        $models = Models::all();
        return view('staff.resources.model.add', compact('models'));
    }
    public function store(Request $request)
    {

        Models::create([
            'nama' => $request->name,
        ]);
        return redirect('/add-models')->with('success', 'Resources berhasil ditambahkan');;
    }
    public function edit($id)
    {
        $models = Models::find($id);
        // return dd($models2);
        return view('staff.resources.model.edit', compact('models'));
    }
    public function update(Request $request, $id)
    {

        Models::where('id', $id)
            ->update(
                [
                    'nama' => $request->name,
                ]
            );
        return redirect('/add-models')->with('success', 'Resources berhasil diubah');
    }
    public function destroy($id)
    {
        Models::where('id', $id)->delete();
        return redirect()->back();
    }
}
