<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
  public function index(){
    return view('auth.passwords.change');
  }



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
          return redirect('home')->with('error', 'No se ha podido establecer una nueva conttraseña');
        }
      }
    }
    else
    {
      return redirect()->to('/');
    }

  }

  public function all() {
      $todos = User::where('id','=',Auth::user()->id)->get();
      return $todos;
  }

}
