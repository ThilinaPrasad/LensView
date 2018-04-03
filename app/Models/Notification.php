<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id','user_id','messege','img_link_1','img_link_2','status'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
