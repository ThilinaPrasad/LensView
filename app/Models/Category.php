<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','creater_id'
    ];

    public function image(){
        return $this->hasMany('App\Models\Image');
    }

}
