<?php

namespace App\Http\Controllers;

use App\ServicesConfirm;
use Illuminate\Http\Request;

class ServicesConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $services = ServicesConfirm::orderBy('created_at','desc')->get();
      return $services;
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
      $service = ServicesConfirm::create($request->all());
      return response()->json($service, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServicesConfirm  $servicesConfirm
     * @return \Illuminate\Http\Response
     */
    public function show(ServicesConfirm $servicesConfirm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServicesConfirm  $servicesConfirm
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicesConfirm $servicesConfirm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicesConfirm  $servicesConfirm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicesConfirm $servicesConfirm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicesConfirm  $servicesConfirm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicesConfirm $servicesConfirm)
    {
        //
    }
}
