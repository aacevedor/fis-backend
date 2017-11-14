<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\PushNotification;
use App\ServicesConfirm;
use App\Services;




class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function devel()
    {
      $servicesConfirm = ServicesConfirm::find(8);

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
      $notification->android($priority='high',$message,$title = 'Estatus' );
      $notification->build();
      $notification->send();


      // $user = new PushNotification();
      // $user->add_send_to_all(false);
      // $user->add_query( new class{} );
      // $user->add_emails(['eCtocBblDG4:APA91bEjJkfQr-AIvCC2hQR6JMzlqa_G_1SS4CllyI68lrZGNbwBKu0YPT3unmDY8l-0A8UNtCIU7gHki1obeoT_qlLgWAQhWHzsGlCpWqzUj8LQSYGlOWcuOwjhC3bWpoH_qzJ9tb7c']);
      // $user->message('Notificacion');
      // $user->payload( new class{} );
      // $user->android($priority='high',$message = 'Prueba de envio', $title = 'Notific');
      // $user->build();
      // $user->send();
      dd($notification);
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
