<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class ServicesConfirm extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'service_id', 'price','service_time','total_price','request_date','delivery_date','status_id','user_id'
  ];


  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
   public function services(){
     return $this->belongsTo(Services::class,'service_id');
   }

   public function user_request(){
     return $this->belongsTo(User::class,'user_id');
   }
}
