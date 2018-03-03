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
        //$votes = Vote::all()->where('voter_id',Auth::user()->id);
        $returnArray = [];
        $votes = DB::select("SELECT distinct image_id FROM votes WHERE voter_id='".Auth::user()->id."'");
        foreach($votes as $img){
            array_push($returnArray,$img->image_id);
        }
        //dd(in_array('10',$returnArray));
        return $returnArray;
    }

    
}
