<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use App\Services;
use App\UsersProfile;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChangeProfile;
use App\ServicesConfirm;



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
        'name', 'email','password','ionic_id'
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   public function servicesConfirm(){
     return $this->hasMany(servicesConfirm::class);
   }


    public function SendMail($template){
        switch ($template) {
          case 'changeRole':
            Mail::to('myafarinc@gmail.com')->send(new ChangeProfile());
            break;

          default:
            Mail::to($this->email)->send(new ChangeProfile());
            break;
        }

    }

    /**
   * Detach all roles from a user
   *
   * @return object
   */
    public function detachAllRoles()
    {
        \DB::table('user_has_roles')->where('user_id', $this->id)->delete();
        return $this;
    }
}
