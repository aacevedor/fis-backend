<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{


      function __construct(){
        $this->end_point = env('IONIC_PUSH_API');
        $this->token = env('IONIC_TOKEN');
        $this->profile = env('IONIC_PROFILE');
      }


      public function build(){

      }

      public function send(){


      }
}
