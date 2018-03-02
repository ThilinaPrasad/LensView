<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id','user_id','contest_id','title','description','image','category_id','downloadable'
    ];

    public function contest(){
        return $this->belongsTo('App\Models\Contest');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function votes(){
        return $this->hasMany('App\Models\Vote');
    }

}
