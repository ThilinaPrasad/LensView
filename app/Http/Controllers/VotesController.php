<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class VotesController extends Controller
{
    public function addVote($id){
       Vote::create([
            'voter_id'=>Auth::user()->id,
            'image_id'=>$id,
        ]);
    }

    public function removeVote($id){
       DB::table('votes')->where('image_id', $id )->where('voter_id',Auth::user()->id)->delete();
    }

    public static function show(){
        $votes = Vote::all()->where('voter_id',Auth::user()->id);
        return $votes;
    }

    
}
