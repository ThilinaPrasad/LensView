<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id','category'
    ];

    public function image(){
        return $this->hasMany('App\Models\Image');
    }

}
