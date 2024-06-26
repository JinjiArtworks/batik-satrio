<?php

namespace App\Http\Controllers\Customers\Custom;

use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutCustomController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $courierName = $request->courier;
        $list = session()->get('list');
        $usersCity = Auth::user()->city_id;
        $city  = City::whereId($usersCity)->get('name');
        if ($request->origin && $request->destination && $request->weight && $request->courier) {
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;
            $province = $request->province;
            $service = $request->service;
            $response = Http::asForm()->withHeaders([
                'key' => '91f6ce360df9a6e2ca7badaae61f5b78'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
                'province_id' => $province,
            ]);
            $OKE = $response['rajaongkir']['results'][0]['costs'][0]['service'];
            if ($courier == 'jne') {
                if ($service == 'OKE') {
                    $cekongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
                } else if ($service == 'REG') {
                    $cekongkir = $response['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
                }
            }
            $cekongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        } else {
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $cekongkir = null;
        }
        $userName = $user->name;
        // payment gateway
        \Midtrans\Config::$serverKey = 'SB-Mid-server-yUxga--v_4EQ_EKe8TWMMmbZ';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // return dd($request->all());
        $grandTotal =  $request->total + $cekongkir;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $grandTotal,
            ),
            'customer_details' => array(
                'first_name' => $userName,
                'phone' => '08111222333',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($params);
        return view('customers.custom.checkout', ['snap_token' => $snapToken],  compact('list', 'cekongkir', 'courierName', 'city'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $json = json_decode($request->get('json'));
        $list = session()->get('list');
        $orders = new Order();
        $orders->users_id = $user->id;
        $orders->nama = $user->name;
        $orders->nomor_hp = $user->phone;
        $orders->alamat = $user->address;
        $orders->tanggal = Carbon::now();
        $orders->ongkos_kirim = $request->ongkir;
        $orders->jenis_pembayaran = $json->payment_type;
        $orders->jenis_pesanan = 'Custom';
        $orders->status = 'Menunggu Konfirmasi Penjual';
        $orders->preorder = '3 Hari';
        $orders->ekspedisi = $request->courierName;
        $orders->total = $request->grandTotal;
        $saved =  $orders->save();
        foreach ($list as $item) {
            $details = new OrderDetail();
            $details->order_id = $orders->id;
            $details->quantity = $item['quantity'];
            $details->request_ukuran = $item['size'];
            $details->request_kain = $item['kain'];
            $details->request_teknik = $item['teknik'];
            $details->request_description = $item['description'];
            $details->request_model = $item['model'];
            $details->request_motif = $item['motif'];
            $details->request_lengan = $item['tipe'];
            if ($item['metode'] == 'Custom') {
                $details->request_result = $item['images_custom'];
            } else if ($item['metode'] == 'Upload') {
                $details->request_result = $item['images'];
            }
        }
        $details->harga = $item['harga'];
        $details->save();
        if (!$saved) {
            return redirect('/')->with('warning', 'Silahkan Menyelesaikan Pembayaran');
        } else {
            session()->forget('list');
            return redirect('/history-order')->with('success', 'Produk berhasil di order');
        }
    }
}
