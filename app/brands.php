<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table = 'brands';
   	protected $fillable = [
   		'name',

   	];

   	public function prducts()
   	{
   		return $this->belongsTo('App\products','brand_id','id');
   	}	
}
