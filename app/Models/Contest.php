<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'user_id','title','description','cover_img','sub_start_at','sub_end_at','closed_at',
        'prize','prize_description','prize_img'
    ];
    
}
