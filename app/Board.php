<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Board extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "boards";

    protected $fillable = ['id','identificable','slug','codeQR','commerce_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'identificable'
            ]
        ];
    }

    public function commerce(){
      return $this->belongsTo('App\Commerce');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
