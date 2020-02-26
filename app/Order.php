<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Order extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = 'orders';

    protected $fillable = ['id','state','identification','slug','totalPrice','user_id','commerce_id','board_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'identification'
            ]
        ];
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function commerce(){
        return $this->belongsTo('App\Commerce');
    }

    public function board(){
        return $this->belongsTo('App\Board');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}

