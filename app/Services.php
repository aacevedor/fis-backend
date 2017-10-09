<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\ServicesTypes;
use App\ServicesComments;
use App\User;




class Services extends Model
{
    public function service_type(){
      return $this->hasOne(ServicesTypes::class);
    }

    public function service_comments()
    {
      return $this->hasMany(ServicesComments::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
