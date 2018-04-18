<?php

namespace Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewer_id','contest_id','img_id','comment'
    ];

}
