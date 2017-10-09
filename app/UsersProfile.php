<?php

namespace App;
use App\User;


use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    public function user()
    {
      return $this->hasMany(User::class);
    }
}
