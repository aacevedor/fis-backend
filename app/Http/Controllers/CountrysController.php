<?php

namespace App\Http\Controllers;

use App\Countrys;
use Illuminate\Http\Request;

class CountrysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Countrys::all();
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
    public function store(Request $request)
    {
        $country = Countrys::create($request->all());
        return  response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Countrys  $countrys
     * @return \Illuminate\Http\Response
     */
    public function show(Countrys $country)
    {
        return $country;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Countrys  $countrys
     * @return \Illuminate\Http\Response
     */
    public function edit(Countrys $countrys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Countrys  $countrys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countrys $countrys)
    {
        $countrys->update($request->all());
        return response()->json($countrys, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Countrys  $countrys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countrys $countrys)
    {
        $countrys->delete();
        return response()->json(null, 205);
    }
}
