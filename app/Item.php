<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = "items";
    protected $fillable = ['order_id','product_id'];
    
    public function order(){
    	return $this->belongsTo('App\Order');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
