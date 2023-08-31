<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\Preview;
use App\Models\Results;
use App\Models\Teknik;
use Illuminate\Http\Request;

class AddResultsController extends Controller
{
    public function index()
    {
        $results = Results::all();
        return view('staff.resources.results.add', compact('results'));
    }
    public function store(Request $request)
    {
        if ($request->image != null) {
            $destinationPath = '/images';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            Results::create([
                'tipe' => $request->tipe,
                'motif' => $request->motif,
                'results_images' => $request->image->getClientOriginalName(),
            ]);
        }
        return redirect('/add-results')->with('success', 'Resources berhasil ditambahkan');
    }
    public function edit($id)
    {
        $results = Results::find($id);
        return view('staff.resources.results.edit', compact('results'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/images';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Results::where('id', $id)
            ->update(
                [
                    'tipe' => $request->tipe,
                    'motif' => $request->motif,
                    'results_images' => $request->image->getClientOriginalName(),
                ]
            );
        return redirect('/add-results')->with('success', 'Resources berhasil diubah');
    }
    public function destroy($id)
    {
        Results::where('id', $id)->delete();
        return redirect()->back();
    }
}
