<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'contest_id','type','name','logo'
    ];

    public function contest(){
        return $this->belongsTo('App\Models\Contest');
    }
}
