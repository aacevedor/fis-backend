<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $entity = new Services;
        $services = array();
        foreach( Services::all() as $key => $service){
            $services[] = $service;
            #dd( $user->hasRole('admin') );
        }
        #dd($services);
        return view('services.list', ['entity'=>$entity ,'services' => $services ] );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $services = Services::orderBy('created_at','desc')->get();

        foreach ($services as $key => $service) {
          $service->user;
        }
        return $services;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::orderBy('created_at','desc')->take(3)->get();

        foreach ($services as $key => $service) {
          $service->user;
        }
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
        $service = Services::create($request->all());
        return response()->json($service, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $service)
    {
        $service->comments;
        return $service;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {
        $services->update($request->all());
        return response()->json($services, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        $service->delete();
        return response()->json(null, 204);
    }

    public function delete(Services $service)
    {
      $service->delete();
      flash('Servicio eliminado')->success();
      return redirect()->to('/services');
    }
}
