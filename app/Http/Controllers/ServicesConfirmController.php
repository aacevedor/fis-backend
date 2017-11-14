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
      $notification->add_send_to_all(false);
      $notification->add_tokens([$service_confirm->services->user->pushNotification->first()->ionic_token]);
      $notification->message('Han contratado tus servicios');
      $notification->payload( new class{} );
      $notification->android($priority='high',
                             $message = $service_confirm->user_request->name.' ha contratado tu servicio '.
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

      $solicitante = [2,3,4,6];
      $prestador = [1,5,7];
      $user_send = '';
      // send to provider
      if( in_array($servicesConfirm->status_id , $prestador) ){
        $user_send = $servicesConfirm->services->user->pushNotification->first()->ionic_token;
        $message = ( $servicesConfirm->status_id == 5 ) ? $servicesConfirm->user_request->name . 'ha aprobado tu trabajo.':'Ha cancelado la solitud.';
      }
      else{ // send to client
        $user_send = $servicesConfirm->user_request->pushNotification->first()->ionic_token;
        if($servicesConfirm->status_id == 2) $message = 'Ha aceptado tu solicitud';
        if($servicesConfirm->status_id == 3) $message = 'Ha comezado a trabajar en tu solicitud';
        if($servicesConfirm->status_id == 4) $message = 'Ha terminado su lavor';
        if($servicesConfirm->status_id == 6) $message = 'Ha rechazado tu solicitud';
      }

      $notification = new PushNotification();
      $notification->add_query( new class{} );
      $notification->add_send_to_all(false);
      $notification->add_tokens([$user_send]);
      $notification->message('Estatus:');
      $notification->payload( new class{} );
      $notification->android($priority='high',$message, $title = $servicesConfirm->services->name);
      $notification->build();
      $notification->send();

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
