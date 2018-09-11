<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orders_detail';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'product_name',
    ];

    public function orders()
    {
        return $this->belongsTo('App\Order','order_id','id');
    }
    public function products()
    {
        return $this->hasMany('App\Product','product_id','id');
    }
}
