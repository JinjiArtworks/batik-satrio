<?php

namespace App\Http\Controllers\Customers;

use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->courier);
        $user = Auth::user();
        $courierName = $request->courier;
        $cart = session()->get('cart');
        $usersCity = Auth::user()->city_id;
        $usersProvince = Auth::user()->province_id;
        $city  = City::whereId($usersCity)->get('name');
        $provinces  = Province::whereId($usersProvince)->get('name');

        if ($request->origin && $request->destination && $request->weight && $request->courier && $request->province) {
            $origin = $request->origin;
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;
            $province = $request->province;
            $service = $request->service;
            // return dd($service);
            $response = Http::asForm()->withHeaders([
                'key' => '91f6ce360df9a6e2ca7badaae61f5b78'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
                'province' => $province,
                'service' => $service,
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
            // return dd($cekongkir);
        } else {
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $province = '';
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
        $grandTotal =  $request->grandTotal + $cekongkir;
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
        return view('customers.cart.checkout', ['snap_token' => $snapToken],  compact('cart', 'cekongkir', 'courierName', 'city', 'provinces'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $json = json_decode($request->get('json'));
        $cart = session()->get('cart');
        // return dd($cart);
        // return dd($request->all());
        $orders = new Order();
        $orders->users_id = $user->id;
        $orders->nama = $user->name;
        $orders->nomor_hp = $user->phone;
        $orders->alamat = $user->address;
        $orders->tanggal = Carbon::now();
        $orders->ongkos_kirim = $request->ongkir; // belum, gunakan raja ongkir
        $orders->jenis_pembayaran = $json->payment_type; // belum, gunakan payment gateway untuk dapat jenis pembayarannya
        $orders->jenis_pesanan = 'Non Custom';
        $orders->status = 'Sedang Diproses';
        $orders->ekspedisi = $request->courierName; // belum, gunakan raja ongkir
        $orders->total = $request->grandTotal;
        $saved =  $orders->save();
        foreach ($cart as $item) {
            $details = new OrderDetail();
            $details->product_id = $item['id'];
            $details->order_id = $orders->id;
            $details->quantity = $item['quantity'];
            if ($item['size'] == 'XXL') {
                $details->harga = $item['price'] + $request->extra;
            } else {
                $details->harga = $item['price'] - $item['diskon'];
            }
            $details->harga_grosir = $item['price_grosir'];
            $details->diskon = $item['diskon'];
            $details->minimal_order = $item['minimal_order'];
            $details->save();
            $product = Product::find($item['id']);
            // return dd($product);
            $product::where('id', $item['id'])
                ->update(
                    [
                        'stok' => $product["stok"] - $item["quantity"],
                        'terjual' => $product["terjual"] + $item["quantity"],
                    ]
                );
        }
        if (!$saved) {
            return redirect('/')->with('warning', 'Silahkan Menyelesaikan Pembayaran');
        } else {
            session()->forget('cart');
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
