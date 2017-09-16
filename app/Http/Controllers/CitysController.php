<?php

namespace App\Http\Controllers;

use App\Citys;
use Illuminate\Http\Request;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Citys::all();
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
       $citys = Citys::create($request->all());
       return response()->json($citys, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function show(Citys $city)
    {
        return $city;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function edit(Citys $citys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citys $citys)
    {
        $citys->update($request->all());
        return response()->json($citys, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citys $citys)
    {
        $citys->delete();
        return response()->json(null, 204);
    }
}
