<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ServicesComments extends Model
{
    //

    protected $fillable = ['service_id','user_id','description'];


    public function autor()
    {
      return $this->belongsTo(User::class);
    }
}
