<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'content',
        'parent_id',
        'user_id',
        'product_id',

    ];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
