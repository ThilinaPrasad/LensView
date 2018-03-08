<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Laravel\Models\Contest;
use Laravel\Models\Image;
use Laravel\User;
use Laravel\Models\Sponsor;
use Illuminate\Support\Facades\Validator;
use DB;
class ContestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show','vote']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now();
      // $contests = Contest::where('sub_start_at','<',$day)->orderBy('created_at','desc')->get();
      $contests = DB::select("Select * FROM contests where sub_start_at < '".$today."' and sub_end_at > '".$today."' ORDER By sub_start_at");
      //dd($day);
      //dd(count($contests));
        return view('contests.index')->with('contests',$contests);
    }
    public function vote(){
        $today = Carbon::today();
      $contests = DB::select("Select * FROM contests where sub_end_at < '".$today."' and closed_at > '".$today."' ORDER BY sub_end_at desc");
        return view('contests.voteAvailable')->with(['contests'=>$contests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        if(Auth::user()->role_id == 3){
        return view('contests.create')->with('date',date('Y-m-d'));
        }else{
            return view('unautherised');
            //Consider about this warning messages
        }
    
    //return view('contests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_s  = Carbon::yesterday();
        $sub_e = (new Carbon($request->input('sub_start_at')))->addDays(5);
        $closed = (new Carbon($request->input('sub_end_at')))->addDays(5);

        $this->validate($request,[
            'title'=>'required',
            'description' => 'required',
            'sub_start_at'=> 'required|date|after:'.$sub_s,
            'sub_end_at'=> 'required|date|after:'.$sub_e,
            'closed_at'=> 'required|date|after:'.$closed,
            'cover_img' => 'required|image|max:2999|dimensions:width=1920,height=1080',         ///Section 1 finished
            'winner' => 'required',
            'winner_info' => 'required',
            'winner_img' => 'required|image|max:1999|dimensions:ratio=1', ///Section 2 finished
            'p_name' => 'required',
            'p_logo' => 'required|image|max:1999|dimensions:ratio=1',
            'g_name' => 'required',
            'g_logo' => 'required|image|max:1999|dimensions:ratio=1',
            'b_name' => 'required',
            'b_logo' => 'required|image|max:1999|dimensions:ratio=1',
        ]);

        $contest = new Contest;
        $contest->user_id = Auth::user()->id;
        $contest->title = $request->input('title');
        $contest->description = $request->input('description');
        $contest->cover_img = FilesController::upload($request,'cover_img','contests_covers','default_cover.jpg');
        $contest->sub_start_at = $request->input('sub_start_at');
        $contest->sub_end_at = $request->input('sub_end_at');
        $contest->closed_at = $request->input('closed_at');
        $contest->prize = $request->input('winner');
        $contest->prize_description = $request->input('winner_info');
        $contest->prize_image = FilesController::upload($request,'winner_img','contests_prizes','default_prize.jpg');
        $contest->save();

        $platinum = Sponsor::create([
            'contest_id'=>$contest->id,
            'type'=>'platinum',
            'name'=>$request->input('p_name'),
            'logo'=>FilesController::upload($request,'p_logo','contests_sponsors','default_sponsor.jpg')
        ]);

        $gold = Sponsor::create([
            'contest_id'=>$contest->id,
            'type'=>'gold',
            'name'=>$request->input('g_name'),
            'logo'=>FilesController::upload($request,'g_logo','contests_sponsors','default_sponsor.jpg')
        ]);

        $bronze = Sponsor::create([
            'contest_id'=>$contest->id,
            'type'=>'bronze',
            'name'=>$request->input('b_name'),
            'logo'=>FilesController::upload($request,'b_logo','contests_sponsors','default_sponsor.jpg')
        ]);

        if($contest && $platinum && $gold && $bronze){
        return redirect()->route('contests.show',['contest'=>$contest])->with('success',"Post Successfully Created!");
        }else{
            return view('contests.create')->with('error',"Error Happend Creating Post! Please Try Again!");
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contest = Contest::find($id);
        $photographs = array_reverse(DB::select('SELECT * FROM images INNER JOIN users ON images.user_id = users.id'));
        $sponsors = Sponsor::all()->where('contest_id',$id);
        $owner = User::where('id',$contest->user_id)->get()->first();
        $today = Carbon::today();
      
        $days_left = date_diff(date_create($contest->sub_end_at),date_create($today))->format('%a');
        $period = date_diff(date_create($contest->sub_end_at),date_create($contest->sub_start_at))->format('%a');
        $days_presentage = round(100 *((int)$days_left) /(int)$period);

        if($days_presentage!=100){
            $days_presentage = (string)$days_presentage;
            $days_presentage = substr($days_presentage,0,1)."0";
        }

      return view('contests.show')->with(['contest'=>$contest,'sponsors'=>$sponsors,'days_left'=>$days_left,'days_presentage'=>$days_presentage,'owner'=>$owner,'photos'=>$photographs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contest = Contest::find($id);
        $sponsors = Sponsor::orderBy('type','desc')->where('contest_id',$id)->get();
        //print_r($sponsors);
        //dd(count($sponsors));
        if(Auth::user()->id == $contest->user_id){
            return view('contests.edit')->with(['contest'=>$contest,'sponsors'=>$sponsors]);
            }else{
                return "<h1 align='center'>Unautherized Action!<h1>";
                //Consider about this warning messages
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contest = Contest::find($id);
        $sponsors = Sponsor::orderBy('type','desc')->where('contest_id',$id)->get();
        $platinum = $sponsors[0];
        $gold = $sponsors[1];
        $bronze = $sponsors[2];

        $sub_s  = Carbon::parse($contest->sub_start_at)->addDays(-1);
        $sub_e = Carbon::parse($contest->sub_end_at)->addDays(-1);
        $closed = Carbon::parse($contest->closed_at)->addDays(-1);
        $this->validate($request,[
            'title'=>'required',
            'description' => 'required',
            'sub_start_at'=> 'required|date|after:'.$sub_s,
            'sub_end_at'=> 'required|date|after:'.$sub_e,
            'closed_at'=> 'required|date|after:'.$closed,
            'cover_img' => 'image|max:2999|dimensions:width=1920,height=1080',         ///Section 1 finished
            'winner' => 'required',
            'winner_info' => 'required',
            'winner_img' => 'image|max:1999|dimensions:ratio=1', ///Section 2 finished
            'p_name' => 'required',
            'p_logo' => 'image|max:1999|dimensions:ratio=1',
            'g_name' => 'required',
            'g_logo' => 'image|max:1999|dimensions:ratio=1',
            'b_name' => 'required',
            'b_logo' => 'image|max:1999|dimensions:ratio=1',
        ]);

        $contest->title = $request->input('title');
        $contest->description = $request->input('description');
        $contest->cover_img = FilesController::upload($request,'cover_img','contests_covers',$contest->cover_img);
        $contest->sub_start_at = $request->input('sub_start_at');
        $contest->sub_end_at = $request->input('sub_end_at');
        $contest->closed_at = $request->input('closed_at');
        $contest->prize = $request->input('winner');
        $contest->prize_description = $request->input('winner_info');
        $contest->prize_image = FilesController::upload($request,'winner_img','contests_prizes',$contest->prize_image);
        
        $platinum->name = $request->input('p_name');
        $platinum->logo = FilesController::upload($request,'p_logo','contests_sponsors',$platinum->logo);

        $gold->name = $request->input('g_name');
        $gold->logo = FilesController::upload($request,'g_logo','contests_sponsors',$platinum->logo);

        $bronze->name = $request->input('b_name');
        $bronze->logo = FilesController::upload($request,'b_logo','contests_sponsors',$platinum->logo);

        $contest->save();
        $platinum->save();
        $gold->save();
        $bronze->save();

        if($contest /*&& $platinum && $gold && $bronze*/){
            return redirect()->route('contests.show',['contest'=>$contest])->with('success',"Post Successfully Created!");
            }else{
                return view('contests.create')->with('error',"Error Happend Creating Post! Please Try Again!");
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contest = Contest::find($id);
        if($contest->delete()){
            return redirect()->route('contests.index')->with('success','Company deleted sucessfully;');
        }
        return back()-withInput()->with('error','Error happened while deleting !');
    }
        
}
