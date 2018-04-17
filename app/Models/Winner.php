<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $fillable = ['contest_id','img_id','winner_id'];

    public function contest(){
        return $this->belongsTo('App\Models\Contest');
    }
}
