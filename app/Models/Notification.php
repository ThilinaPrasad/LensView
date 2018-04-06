<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id','sender_id','type','receiver_id','messege','img_link','status'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
