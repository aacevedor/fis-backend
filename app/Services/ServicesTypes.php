<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Services;

class ServicesTypes extends Model
{

    public function services(){
      $this->hasMany(Services::class);
    }
    
}
