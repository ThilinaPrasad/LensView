<?php

namespace Laravel\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id','name'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }
}
