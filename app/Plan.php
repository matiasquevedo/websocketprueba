<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Plan extends Model
{
    //
    use Sluggable,SluggableScopeHelpers;
    protected $table = "plans";

    protected $fillable = ['id','title','slug','description','price','discount','priceDiscount'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function commerces() {
      return $this->hasMany('App\Commerce');
    } 

}
