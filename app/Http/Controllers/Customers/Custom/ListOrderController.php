<?php

namespace App\Http\Controllers\Customers\Custom;

use App\Models\City;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ListOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $usersCity = Auth::user()->city_id;
        $city  = City::whereId($usersCity)->get('name');
        $list = session()->get('list');
        // return dd($city[0]['name']);
        $allCities = City::all();
        // return dd($list);
        return view('customers.custom.list-order', compact('list','city','allCities'));
    }

    public function addList(Request $request, $id)
    {
        $list[$id] = [
            "id" => $request->gender_id,
            "harga" => $request->harga,
            "model" => $request->model,
            "kain" => $request->kain,
            "weight" => 350,
            "lengan" => $request->lengan,
            "quantity" => $request->post('quantity'),
            "size" => $request->size,
            "warna" => $request->warna,
            "motif" => $request->motif,
            "total_after_disc" => $request->harga  * $request->post('quantity')
        ];
        session()->put('list', $list);
        return redirect('/list-order')->with('success', 'Produk berhasil ditambahkan kedalam keranjang');
    }

    public function destroy($id)
    {
        $list = session()->get('list');
        if (isset($list[$id])) {
            unset($list[$id]);
        }
        session()->put('list', $list);
        return redirect('/list-order')->with('success', 'Keranjang berhasil dihapus!');
    }
}
