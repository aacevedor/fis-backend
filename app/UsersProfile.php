<?php

namespace App;
use App\User;


use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id',
         'first_name',
         'last_name',
         'city_id',
         'gender',
         'description',
         'profession',
         'address',
      ];
    public function user()
    {
      return $this->hasMany(User::class);
    }
}
