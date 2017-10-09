<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function devel()
    {

      #$role = Role::create(['name' => 'admin']);
      // $permission = Permission::create(['name' => 'delete user']);
      // $permission = Permission::create(['name' => 'update user']);
      //
      //
      // $role = Role::findByName('admin');
      // $role->givePermissionTo('delete user');
      // $role->givePermissionTo('update user');

      $user = User::find(21);
      dd($user->can('edit user'));

      dd($user);

      dd('OK');
    }
}
