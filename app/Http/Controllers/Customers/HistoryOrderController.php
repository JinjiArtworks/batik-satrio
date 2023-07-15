<?php

namespace App\Http\Controllers\Customers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $orders = Order::whereUsersId($user)->get(); // already declated a has many from categories, its mean it is beloangsto categories\
        // return dd($orders);
        return view('customers.history.history-order', compact('orders'));
    }
    public function detail($id)
    {
        $details = OrderDetail::whereOrderId($id)->get(); // already declated a has many from categories, its mean it is beloangsto categories
        $getId = $id;
        $reviews = Review::all();
        // $test = OrderDetail::whereOrderId($id)->get('price'); // already declated a has many from categories, its mean it is beloangsto categories
        // $sumPendapatan = collect($details)->sum('price');
        // return dd($details);
        return view('customers.history.history-detail', compact('details', 'getId','reviews'));
    }


    public function store(Request $request, $id)
    {
        $user = Auth::user()->id;
        $product = Review::create([
            'users_id' => $user,
            'products_id' => $id,
            'tanggal' => Carbon::now(),
            'komentar' => $request->comment,
            'rating' => $request->rating
        ]);
        return redirect('history-order');
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
