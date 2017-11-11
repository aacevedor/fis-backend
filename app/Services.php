<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\ServicesTypes;
use App\ServicesConfirm;

use App\ServicesComments;
use App\User;




class Services extends Model
{

    protected $fillable = ['name', 'description', 'services_type_id','user_id','price','service_id'];


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

    public function confirms()
    {
      return $this->hasMany(ServicesConfirm::class,'service_id');
    }
}
