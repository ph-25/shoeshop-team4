<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillabe = [
    	'name',
    	'email',
    	'password',
    	'phone',
    	'address',
    	'user_type',
    	'remember_token',
    ];

    public function comments()
    {
    	return $this->hasMany('App\comments','user_id','id');
    }

    public function orders()
    {
    	return $this->hasMany('App\orders','user_id','id');
    }
}
