<?php

namespace App\Http\Controllers\Customers\Custom;

use App\Models\City;
use App\Models\Ekspedisi;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ListOrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $list = session()->get('list');
        $usersCity = Auth::user()->city_id;
        $usersProvince = Auth::user()->province_id;

        $city  = City::whereId($usersCity)->get('name');
        $province  = Province::whereId($usersProvince)->get('name');

        $allEkspedisi = Ekspedisi::all();
        $allCities = City::all();
        $allProvince = Province::all();
        // return dd($list);
        return view('customers.custom.list-order', compact('list', 'city', 'allCities', 'usersCity', 'usersProvince', 'allProvince', 'allEkspedisi', 'province'));
    }

    public function addList(Request $request, $id)
    {
        // return dd($request->all());
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
            "images" => $request->images,
            "motif" => $request->motif,
            "gender" => $request->gender,
            "total_after_disc" => $request->harga  * $request->post('quantity')
        ];
        session()->put('list', $list);
        return redirect('/list-order')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function destroy($id)
    {
        $list = session()->get('list');
        if (isset($list[$id])) {
            unset($list[$id]);
        }
        session()->put('list', $list);
        return redirect('/list-order')->with('success', 'Pesanan berhasil dihapus!');
    }
}
