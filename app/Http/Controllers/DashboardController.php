<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Http\Controllers\VotesController;
use DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        //dd($today);
        $user_id = Auth::user()->id;
        $votes = VotesController::show();
        $images = DB::select("SELECT *,images.created_at AS published_at,images.title AS img_title,images.description AS img_description,images.user_id AS img_uploader,images.id AS img_id FROM images LEFT JOIN votes_count ON images.id = votes_count.image_id LEFT JOIN users ON images.user_id = users.id LEFT JOIN contests ON images.contest_id = contests.id WHERE contests.sub_end_at < '".$today."'AND contests.closed_at >= '".$today."' ORDER BY published_at desc");
        return view('dashboard')->with(['votes'=>$votes,'images'=>$images]);
    }

    

}
