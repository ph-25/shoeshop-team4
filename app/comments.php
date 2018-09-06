<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
    	'content',
    	'parent_id',
    	'user_id',
    	'product_id',

    ];

    public function products()
    {
    	return $this->belongsTo('App\products','product_id','id');
    }

    public function users()
    {
    	return $this->belongsTo('App\users','user_id','id');
    }
}
