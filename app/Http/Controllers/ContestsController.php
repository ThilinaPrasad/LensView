<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Laravel\Models\Contest;
use Laravel\Models\Sponsor;
class ContestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
       $contests = Contest::where('sub_start_at','<',$today)->orderBy('created_at','desc')->get();
        return view('contests.index')->with('contests',$contests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        if(Auth::user()->role_id == 3){
        return view('contests.create');
        }else{
            return "<h1 align='center'>Unautherized Action!<h1>";
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
        $today = Carbon::today();

        $this->validate($request,[
            'title'=>'required',
            'description' => 'required',
            'sub_start_at'=> 'required|date|after:'.$today,
            'sub_end_at'=> 'required|date|after:'.$today,
            'closed_at'=> 'required|date|after:'.$today,
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
        $sponsors = Sponsor::all()->where('contest_id',$id);
      return view('contests.show')->with(['contest'=>$contest,'sponsors'=>$sponsors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
