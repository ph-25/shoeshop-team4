<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'name',
    ];

    public function Products()
    {
        return $this->belongsTo('App\products','brand_id','id');
    }
}
