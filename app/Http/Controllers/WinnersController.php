<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Winner;
use Illuminate\Http\Request;

class WinnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function select($contest,$img,$winner){

        $contests = Winner::pluck('contest_id')->toArray();

        if(in_array($contest,$contests)){
            echo 'selected';
        }else{
            Winner::create([
                'contest_id'=>$contest,
                'img_id'=>$img,
                'winner_id'=>$winner,
            ]);
        }

        
     }
}
