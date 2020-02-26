<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Commerce extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "commerces";

    protected $fillable = ['id','name','descripcion','slug','user_id','state','mp','sinTACC','tables','ubicacion','latitude','longitude','locality','subAdministrativeArea','logo','portada','plan_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }    

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function plan(){
      return $this->belongsTo('App\Plan');
    }

    public function boards(){
      return $this->hasMany('App\Board');
    }

    public function categories(){
      return $this->hasMany('App\Category');
    }

    public function products(){
      return $this->hasMany('App\Product');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
