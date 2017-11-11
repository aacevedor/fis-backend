<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UsersProfile;
use App\ServicesConfirm;


use Socialite;
class UsersController extends Controller
{

    protected $fillable = ['avatar','id_facebook','profile_facebook','token_facebook','gender_facebook'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return User::role('provider')->get();
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

        $user = User::where('ionic_id',$request->ionic_id)->first();
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->ionic_id =  $request->ionic_id;
            $user->save();

        }else{
          $user = User::firstOrCreate([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('p0p01234'),
                'ionic_id' => $request->ionic_id,
          ]);

          $user->roles()->attach([2]);

          $profile = new UsersProfile();
          $profile->user_id = $user->id;
          $profile->first_name = $user->name;
          $profile->last_name = '';
          $profile->city_id = 1;
          $profile->gender = 'male';
          $profile->description = '';
          $profile->profession = '';
          $profile->phone = 0;
          $profile->address = '';
          $profile->geolocalization = json_encode(['lat'=>4.6461602,'long'=>-74.113472]);
          $profile->image = 'http://lorempixel.com/320/160/?51976';
          $profile->save();



        }
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $user->{'profile'} = $user->profile;
      $user->{'services'} = $user->services;
      foreach ( $user->servicesConfirm as $key => $value) { $value->services;}
      $user->{'services_confirm'} = $user->servicesConfirm;
      $user->{'roles'} = $user->getAllPermissions();
      return $user;

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
    public function update(Request $request, User $user)
    {
        $user->detachAllRoles();
        $user->roles()->attach($request->get('role'));
        flash('Usuario guardado')->success();
        return redirect()->to('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('Usuario eliminado')->success();
        return redirect()->to('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id){
      return UserProfile::find($id)->profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function services($id){
      return UserProfile::find($id)->services;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',
      ], $messages);

      return $validator;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postCredentials(Request $request)
    {
      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
          return redirect('home')->with('error', 'No se ha podido establecer una nueva contraseña');
        }
        else
        {
          $current_password = Auth::User()->password;
          if(Hash::check($request_data['current-password'], $current_password))
          {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save();
            return redirect('home')->with('status', 'Se ha cambiado la contraseña con exito');
          }
          else
          {
            return redirect('home')->with('error', 'No se ha podido establecer una nueva contraseña');
          }
        }
      }
      else
      {
        return redirect()->to('/');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function get() {
        $users = User::all();
        return $users;
    }

    public function change(){
      return view('auth.passwords.change');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $user = $this->firstOrCreateSocialFacebookUser('facebook', $user->id, $user);
        Auth::login($user,true);
        return redirect()->route('home');

        // $user->token;
    }

    public function firstOrCreateSocialFacebookUser($type, $id, $userObj){

      $user = User::where('id_facebook', $id)->first();
      if($user){
        return $user;
      }
      $user = User::create([
          'name'     => $userObj->name,
          'email'    => $userObj->email,
          'avatar'   => $userObj->avatar,
          'password' => bcrypt('p0p01234'),
          'id_facebook' => $userObj->id,
          'profile_facebook' => $userObj->profileUrl,
          'token_facebook'=> $userObj->token,
          'gender_facebook' =>$userObj->user['gender'],

        ]);
        return $user;

    }

    public function confirmation($ionic_id)
    {
      $user = User::where('ionic_id',$ionic_id)->first();
      if($user){
        $contracts = [];
        $user->{'contracts'} = [];
        $user->{'profile'} = $user->profile;
        $user->{'services'} = $user->services;
        foreach ( $user->services as $key => $value) { $value->confirms; }
        $user->{'services_confirm'} = $user->servicesConfirm;
        $user->{'roles'} = $user->roles()->get()[0];
        return $user;
      }
      return '404';
    }

    public function adminNotification($type, $id)
    {
      $user = User::find($id);
      $user->SendMail($type);
      return 200;
    }
}
