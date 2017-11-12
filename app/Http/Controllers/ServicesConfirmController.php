<?php

namespace App\Http\Controllers;

use App\ServicesConfirm;
use Illuminate\Http\Request;
use App\PushNotification;


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
      $service_confirm = ServicesConfirm::create($request->all());
      $notification = new PushNotification();
      $notification->add_query( new class{} );
      $notification->add_send_to_all(true);
      $notification->add_emails([$service->services->user->email]);
      $notification->message('Han contratado tus servicios');
      $notification->payload( new class{} );
      $notification->android($priority='high',
                             $message = $service_confirm->services->user->name.' ha contratado tu servicio '.
                             $service_confirm->services->name, $title = 'Han contratado tu servicio'
                            );
      $notification->build();
      $notification->send();
      return response()->json($service_confirm, 201);
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
      $servicesConfirm->update($request->all());

      return $servicesConfirm;
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
