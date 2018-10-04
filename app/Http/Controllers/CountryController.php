<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\StoreUpdateCountry;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        return response()->json($countries);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCountry $request)
    {
        $country = new Country();
        $country->fill($request->all());
        $country->save();
        return response()->json($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::whereId($id)->first();
        return response()->json($country);
    }

    public function list()
    {
        $countries = Country::get()->pluck('name', 'id');
        $countries = collect($countries)->map(function($item, $key){
            return ['value' => $key, 'text' => $item];
        })->values();
        return response()->json($countries);
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
    public function update(StoreUpdateCountry $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->fill($request->all());
        $country->save();
        return response()->json($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(["message" => "Country deleted successfully"]);
    }
}
