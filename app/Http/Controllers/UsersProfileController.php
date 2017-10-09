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
    public function index()
    {
        $users = array();
        foreach( User::role('provider')->take(3)->get() as $key => $user){
            $users[] = $user->profile;
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
        //
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
        //
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
