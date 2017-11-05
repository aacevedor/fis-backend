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

      $user = User::find(56);
      dd($user);
      $user = User::firstOrCreate([
            'name' => 'ASDASDssssssssASD',
            'email' => 'AssssSDASsssD@ASDASsssssssD.COM',
            'password' => bcrypt('p0p01234'),
            'ionic_id' => 'ASDASD-ADA-SD-ASD-ASD-AS-D',
      ]);

      dd($user->name);

      // $user = User::where('ionic_id','77d633fb-4b21-4ff9-bad0-b75de2577916')->first();
      // dd($user);
      //
      // foreach ( [21] as $key => $value) {
      //   $user = User::find($value);
      //   $user->assignRole('authenticated');
      // }


      // $role = Role::create(['name' => 'provider']);
      // $role = Role::create(['name' => 'authenticated']);

      // $permission = Permission::create(['name' => 'show user']);
      //
      //
      // $permission = Permission::create(['name' => 'show service']);
      // $permission = Permission::create(['name' => 'delete service']);
      // $permission = Permission::create(['name' => 'update service']);
      // $permission = Permission::create(['name' => 'create service']);
      // $permission = Permission::create(['name' => 'cancel service']);
      // $permission = Permission::create(['name' => 'solicit service']);
      //
      // $permission = Permission::create(['name' => 'show comment']);
      // $permission = Permission::create(['name' => 'delete comment']);
      // $permission = Permission::create(['name' => 'update comment']);
      // $permission = Permission::create(['name' => 'create comment']);




      //
      //
      //
      // $role->givePermissionTo('create service');
      // $role->givePermissionTo('update service');
      //
      //
      // $role->givePermissionTo('show comment');
      // $role->givePermissionTo('create comment');




      // $user = User::find(21);
      // dd($user->can('edit user'));
      //
      // dd($user);

      dd('OK');
    }
}
