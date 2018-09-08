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
    public function brands()
    {
        return $this->hasMany('App\Brand','brand_id','id');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail','product_id','id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','product_id','id');
    }
}
