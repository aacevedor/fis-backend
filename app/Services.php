<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\ServicesTypes;


class Services extends Model
{
    public function service_type(){
      return $this->belongsTo(ServicesTypes::class);
    }
}
