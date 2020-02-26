<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "categories";

    protected $fillable = ['id','slug','name','commerce_id',];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function commerce(){
      return $this->belongsTo('App\Commerce');
    }

    public function products(){
      return $this->hasMany('App\Product');
    }
}
