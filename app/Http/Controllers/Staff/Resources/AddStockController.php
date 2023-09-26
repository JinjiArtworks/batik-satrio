<?php

namespace App\Http\Controllers\Staff\Resources;

use App\Http\Controllers\Controller;
use App\Models\Bahan;
use App\Models\Models;
use Illuminate\Http\Request;

class AddStockController extends Controller
{
    public function index($id)
    {
        $bahan = Bahan::find($id);
        return view('staff.resources.stock.add', compact('bahan'));
    }
    public function update(Request $request, $id)
    {
        Bahan::where('id', $id)
            ->update(
                [
                    'stock_bahan' => $request->stock,
                    'satuan' => $request->deskripsi,
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
