<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Winner;
use Illuminate\Http\Request;
use Laravel\Http\Controllers\NotificationsController;
use Laravel\Models\Contest;
use Illuminate\Support\Facades\Auth;

class WinnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function select($contest,$img,$winner){
        $contest_data = Contest::find($contest); 
        $contests = Winner::pluck('contest_id')->toArray();
        
        if(in_array($contest,$contests)){
            echo 'selected';
        }else{
            Winner::create([
                'contest_id'=>$contest,
                'img_id'=>$img,
                'winner_id'=>$winner,
            ]);
            NotificationsController::send(Auth::user()->id,1,"has publish winner of contest <a href='/winner/".$contest_data->id."' title='View contest'>".$contest_data->title."</a>.",asset('img/static/winner-throphy.png'),'public');
            NotificationsController::send(Auth::user()->id,$winner,"selected you as the winner of the contest <a href='/winner/".$contest_data->id."' title='View contest'>".$contest_data->title."</a>",asset('img/static/winner-throphy.png'),'photographer');
            NotificationsController::sendMail($winner,'Winning Photography Contest',$contest_data,'contest-winner');
        }

        
     }
}
