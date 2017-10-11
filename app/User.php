<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use App\Services;
use App\UsersProfile;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','ionic_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function profile(){
      return $this->hasOne(UsersProfile::class);
     }

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    public function services(){
      return $this->hasMany(Services::class);
    }
}
