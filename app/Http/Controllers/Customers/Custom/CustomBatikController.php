<?php

namespace App\Http\Controllers\Customers\Custom;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CustomBatikController extends Controller
{
    public function index()
    {
        $list = session()->get('list');
        return view('customers.custom.index', compact('list'));
    }
    public function details(Request $request , $id)
    {
        $gender = $request->gender;
        $gender_id = $request->gender_id;
        // return dd($request->all());
        return view('customers.custom.custom',compact('gender','gender_id'));
    }


    public function store(Request $request)
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
