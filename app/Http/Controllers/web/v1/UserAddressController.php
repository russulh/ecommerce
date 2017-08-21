<?php

namespace App\Http\Controllers\web\v1;

use App\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * [create for adding new address]
     * @param  Request $request [form data]
     * @return [redirect]       [the page of view]
     */
    public function create(Request $request)
    {
      $validator = Validator::make($request->all(),[
         'country'   => 'required',
         'city'      => 'required',
         'region'    => 'required',
      ]);

      if($validator->fails())
         return back()->withErrors($validator->errors())->withInput();

      $address = new UserAddress;
      $address->user_id    =  Auth::user()->id;
      $address->country    =  $request->country;
      $address->city       =  $request->city;
      $address->region     =  $request->region;
      $address->zip_code   =  $request->zip;

      if($address->save())
      {
         return redirect('/user/addresses');
      }
      return abort(500);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $useraddress   =  UserAddress::find($id);
      // return $useraddress;
      if(!$useraddress)
         return redirect('/user/addresses');

      // return var_dump($useraddress->user_id);
      if(Auth::user()->id == $useraddress->user_id){
         $useraddress->delete();
      }
      return redirect('/user/addresses');
    }
}
