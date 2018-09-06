<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $table = 'order_detail';
    protected $fillale = [
    	'order_id',
    	'product_id',
    	'quantity',
    	'price',
    	'product_name',
    ];

    public function products()
    {
    	return $this->belongsTo('App\products','product_id','id');
    }
    public function orders()
    {
    	return $this->belongsTo('App\orders','order_id','id';)
    }
}
