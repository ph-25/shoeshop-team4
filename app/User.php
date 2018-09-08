<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'user_type',
        'remember_token',
    ];
    public function Comments()
    {
        return $this->hasMany('App\comments','user_id','id');
    }

    public function Orders()
    {
        return $this->hasMany('App\orders','user_id','id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
