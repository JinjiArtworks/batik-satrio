<?php

namespace App\Http\Controllers\Customers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $usersCity = Auth::user()->city_id;
        $usersProvince = Auth::user()->province_id;
        
        $city  = City::whereId($usersCity)->get('name');
        $province  = Province::whereId($usersProvince)->get('name');
        // return dd($city[0]['name']);
        $allCities = City::all();
        $allProvince = Province::all();
        return view('customers.profile.profile', compact('user','city','province','allCities','allProvince','usersCity','usersProvince'));
    }

    public function store(Request $request)
    {
        // Send into Wishlist

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
    public function update(Request $request)
    {
        $user = Auth::user()->id;
        User::where('id', $user)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'city_id' => $request->city,
                    'province_id' => $request->province,
                ]
            );
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
    }
}
