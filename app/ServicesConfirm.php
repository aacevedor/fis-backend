<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesConfirm extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'service_id', 'price','service_time','total_price','request_date','delivery_date'
  ];
}
