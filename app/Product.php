<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Product extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "products";

    protected $fillable = ['id','state','title','slug','descripcion','precio','descuento','precioDescuento','commerce_id','category_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function commerce(){
      return $this->belongsTo('App\Commerce');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function image(){
        return $this->morphOne('App\Imagem', 'imagetable');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}

