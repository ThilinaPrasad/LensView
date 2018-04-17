<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Http\Controllers\VotesController;
use Laravel\Models\Category;
use Laravel\Models\Winner;
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
    public function index($tab='vote')
    {
        $today = Carbon::today();
        //dd($today);
        $user_id = Auth::user()->id;
        if(Auth::user()->role_id=='1'){
        $votes = VotesController::show();
        $images = DB::select("SELECT *,images.created_at AS published_at,images.title AS img_title,images.description AS img_description,images.user_id AS img_uploader,images.id AS img_id FROM images LEFT JOIN votes_count ON images.id = votes_count.image_id LEFT JOIN users ON images.user_id = users.id LEFT JOIN contests ON images.contest_id = contests.id WHERE contests.sub_end_at < '".$today."'AND contests.closed_at >= '".$today."' ORDER BY published_at desc");
        return view('dashboard')->with(['votes'=>$votes,'images'=>$images]);
        }elseif(Auth::user()->role_id=='2'){
            $submission_images = DB::select("SELECT *,images.title AS img_title,images.description AS img_description,images.created_at AS img_submittedDate,images.id AS img_id,categories.name AS category FROM images LEFT JOIN submission_contests ON images.contest_id = submission_contests.id LEFT JOIN categories ON images.category_id=categories.id WHERE images.contest_id IN (SELECT id FROM submission_contests) AND images.user_id='".Auth::user()->id."' ORDER BY images.created_at");
            $voting_images = DB::select("SELECT *,images.title AS img_title,images.description AS img_description,categories.name AS category,images.created_at AS img_submittedDate,images.id AS img_id FROM images LEFT JOIN voting_contests ON images.contest_id= voting_contests.id LEFT JOIN categories ON images.category_id=categories.id WHERE images.contest_id IN (SELECT id FROM voting_contests) AND images.user_id='".Auth::user()->id."' ORDER BY images.created_at");
            
            //Joined Contests section
            $submission_contests = DB::select("SELECT * FROM submission_contests WHERE submission_contests.id IN (SELECT DISTINCT contest_id FROM images where user_id='".Auth::user()->id."')");
            $voting_contests = DB::select("SELECT * FROM voting_contests WHERE voting_contests.id IN (SELECT DISTINCT contest_id FROM images where user_id='".Auth::user()->id."')");
            return view('dashboard')->with(['submission_images'=>$submission_images,'voting_images'=>$voting_images,'sub_contests'=>$submission_contests,'vot_contests'=>$voting_contests,'tab'=>$tab]);
        }elseif(Auth::user()->role_id=='3'){
            $submission_contests = DB::select("SELECT * FROM submission_contests WHERE user_id='".Auth::user()->id."' ORDER BY created_at");
            $voting_contests = DB::select("SELECT * FROM voting_contests WHERE user_id='".Auth::user()->id."' ORDER BY created_at");
            $upcoming_contests = DB::select("SELECT * FROM upcoming_contests WHERE user_id='".Auth::user()->id."' ORDER BY created_at");
            $closed_contests = DB::select("SELECT *,closed_contests.id AS contest_id FROM closed_contests LEFT JOIN winners ON closed_contests.id = winners.contest_id WHERE closed_contests.user_id='".Auth::user()->id."' ORDER BY closed_contests.created_at desc");
            //dd($closed_contests);
            $categories = Category::orderBy('created_at','desc')->paginate(10);

            $winner_votes = VotesController::show();
            $winner_img = DB::select("SELECT *,images.id AS img_id,images.title AS img_title,images.user_id AS img_user FROM images LEFT JOIN votes_count ON images.id = votes_count.image_id LEFT JOIN closed_contests ON images.contest_id= closed_contests.id WHERE closed_contests.user_id='".Auth::user()->id."'");
           // dd($winner_img);
            return view('dashboard')->with(['sub_contests'=>$submission_contests,'vot_contests'=>$voting_contests,'up_contests'=>$upcoming_contests,'closed_contests'=>$closed_contests,'categories'=>$categories,'winner_imgs'=>$winner_img,'tab'=>$tab]);
        }
    }

    

}
