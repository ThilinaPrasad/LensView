<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'voter_id','image_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function image(){
        return $this->belongsTo('App\Models\Image');
    }
}
