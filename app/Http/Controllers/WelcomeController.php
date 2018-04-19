<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Image;
use Laravel\Models\Contest;
use Laravel\User;
use Laravel\Models\Review;
use Illuminate\Http\Request;
use DB;
class WelcomeController extends Controller
{
    
    
    public function index(){

        //Caurosal slider 
        $images = DB::select('SELECT *,images.title AS img_title FROM winners LEFT JOIN images ON winners.img_id = images.id LEFT JOIN contests ON images.contest_id = contests.id ORDER BY winners.created_at desc');

        if(count($images)>3){
            $images = array_slice($images,0,3);  //select only 3 images 
        }

        // Counter values
        $user_count = count(User::all());
        $image_count = count(Image::all());
        $contest_count = count(Contest::all());

        // retriew reviews from DB 
        $reviews = DB::select('SELECT * FROM reviews LEFT JOIN users ON reviews.reviewer_id = users.id');

        return view('welcome')->with(['images'=>$images,'user_count'=>$user_count,'contest_count'=>$contest_count,'image_count'=>$image_count,'reviews'=>$reviews]);
    }
}
