<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
    public function Brands()
    {
        return $this->hasMany('App\brands','brand_id','id');
    }

    public function OrderDetails()
    {
        return $this->hasMany('App\order_detail','product_id','id');
    }

    public function Comments()
    {
        return $this->hasMany('App\comments','product_id','id');
    }
}
