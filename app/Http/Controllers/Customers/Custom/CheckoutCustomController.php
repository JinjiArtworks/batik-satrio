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
        // dd($request->courier);
        // return dd($request->all()); 
        $user = Auth::user();
        $userSaldo = Auth::user()->saldo;
        $courierName = $request->courier;
        // return dd($courierName);
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
            // $resultz = json_decode($response);
            // return ($OKE);
            if ($courier == 'jne') {
                if ($service == 'OKE') {
                    $cekongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
                    // return dd($cekongkir);
                } else if ($service == 'REG') {
                    $cekongkir = $response['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
                    // return dd($cekongkir);
                }
                // } else if ($service == 'YES') {
                //     $cekongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][1]['value'];
                //     return dd($cekongkir);

            }
            // $resultz = json_decode($response);
            // return ($resultz);
            $cekongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
            // return dd($cekongkir);
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
        return view('customers.custom.checkout', ['snap_token' => $snapToken],  compact('list', 'userSaldo', 'cekongkir', 'courierName', 'city'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $userSaldo = Auth::user()->saldo;
        $json = json_decode($request->get('json'));
        $list = session()->get('list');
        $orders = new Order();
        $orders->users_id = $user->id;
        $orders->nama = $user->name;
        $orders->nomor_hp = $user->phone;
        $orders->alamat = $user->address;
        $orders->tanggal = Carbon::now();
        $orders->ongkos_kirim = $request->ongkir; // belum, gunakan raja ongkir
        if ($request->pembayaran == 'Transfer') {
            $orders->jenis_pembayaran = $json->payment_type;
        } else {
            User::where('id', $user->id)
                ->update(
                    [
                        'saldo' => $userSaldo - $request->grandTotal,
                    ]
                );
            $orders->jenis_pembayaran = $request->pembayaran;
        }
        $orders->jenis_pesanan = 'Custom';
        $orders->status = 'Menunggu Konfirmasi Penjual';
        $orders->preorder = '3 Hari';
        $orders->ekspedisi = $request->courierName; // belum, gunakan raja ongkir
        $orders->total = $request->grandTotal;
        $saved =  $orders->save();
        foreach ($list as $item) {
            $details = new OrderDetail();
            $details->order_id = $orders->id;
            $details->quantity = $item['quantity'];
            $details->request_ukuran = $item['size'];
            $details->request_kain = $item['kain'];
            $details->request_model = $item['model'];
            $details->request_motif = $item['motif'];
            $details->request_lengan = $item['tipe'];
            // return dd($item['metode']);
            if ($item['metode'] == 'Custom') {
                $details->request_result = $item['images_custom'];
            } else if ($item['metode'] == 'Upload') {
                $details->request_result = $item['images'];
            }
            $details->harga = $item['harga'];
            $details->save();
        }
        if (!$saved) {
            return redirect('/')->with('warning', 'Silahkan Menyelesaikan Pembayaran');
        } else {
            session()->forget('list');
            return redirect('/history-order')->with('success', 'Produk berhasil di order');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
