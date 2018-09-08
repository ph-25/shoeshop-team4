<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'user_name',
        'total',
        'date',
        'phone',
        'address',
        'status',
    ];

    public function Users()
    {
        return $this->belongsTo('App\users','user_id','id');
    }
    public function OrderDetails()
    {
        return $this->hasMany('App\order_detail','order_id','id');
    }
}
