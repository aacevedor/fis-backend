<?php

namespace App\Http\Controllers;

use App\UsersProfile;
use App\User;


use Illuminate\Http\Request;

class UsersProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $entity = new User;
        $users = array();
        foreach( User::all() as $key => $user){
            $user->profile;
            $user->services;
            $users[] = $user;
            #dd( $user->hasRole('admin') );
        }
        #dd($users);
        return view('user.list', ['entity'=>$entity ,'users' => $users ] );

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function providerList()
    {
        $users = array();
        foreach( User::role('provider')->orderBy('updated_at','desc')->get() as $key => $user){
            $user->profile;
            $user->services;
            $users[] = $user;
        }
        return $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = array();
        foreach( User::role('provider')->orderBy('updated_at','desc')->take(3)->get() as $key => $user){
            $user->profile;
            $user->services;
            $users[] = $user;
        }
        return $users;
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersProfile  $usersProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UsersProfile $usersProfile)
    {
        return $usersProfile;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersProfile  $usersProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersProfile $usersProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersProfile  $usersProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersProfile $usersProfile)
    {

        $usersProfile->update($request->all());

        return $usersProfile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsersProfile  $usersProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersProfile $usersProfile)
    {
        //
    }

}
