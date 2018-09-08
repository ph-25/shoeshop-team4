<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
	protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
    	'brand_id',
    	'name',
    	'price',
    	'content',
    	'color',
    	'image',
    	'size',
    	'sex',
    	'quantity',
    ];
    public function brands()
    {

    	return $this->hasMany('App\brands','brand_id','id');
    }

    public function order_detail()
    {
    	return $this->hasMany('App\order_detail','product_id','id');
    }

    public function comments()
    {
    	return $this->hasMany('App\comments','product_id','id');
    }
}
