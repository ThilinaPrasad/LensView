<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Category;
use Laravel\Models\Image;
use Illuminate\Http\Request;
use Laravel\Models\Contest;
use Laravel\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Laravel\Http\Controllers\VotesController;
class PhotosController extends Controller
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
        
        //return view('photos.vote');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        //if(Auth::user()->role_id == 2){
        $categories = Category::all();
        return view('photos.upload')->with(['contest'=>$id,'categories'=>$categories]);
    //}else{
    //    return view('unautherised');
        //Consider about this warning messages
   // }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description' => 'required',
            'upload_img' => 'required|image|max:2999|dimensions:width=1920,height=1080',         ///Section 1 finished
            'category' => 'required',
            //'downloadable' => 'nullable',
        ]);

        //downloadability passer
        
        $photo = Image::create([
            'user_id'=> Auth::user()->id,
            'contest_id'=>$request->input('contest_id'),
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'image'=>FilesController::upload($request,'upload_img','contest_images','upload_image.jpg'),
            'category_id'=>$request->input('category'),
            'downloadable'=>$request->input('downloadable'),
        ]);

        if($photo){
            return redirect('contests/'.$request->input("contest_id"))->with('success',"Photograph Uploaded Successfully!");
            }else{
                return view('photos.upload')->with('error',"Error Happend uploading photograph! Please Try Again!");
            }

    }

    public function showVoting($id=null){
        $contest = Contest::find($id);
        $user = User::find($contest->user_id);
        //$images = Image::all()->where('contest_id',$id);
        $votes = VotesController::show();
        $images = DB::select("SELECT * FROM images LEFT JOIN votes_count ON images.id = votes_count.image_id  WHERE images.contest_id = '".$id."'");
        return view('photos.vote')->with(['contest'=>$contest,'images'=>$images,'user'=>$user,'votes'=>$votes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        $img_category = Category::find($image->category_id);
        $categories = Category::all();
        return view('photos.edit')->with(['image'=>$image,'img_category'=>$img_category,'categories'=>$categories]);
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
        $photograph = Image::find($id);

        $this->validate($request,[
            'title'=>'required',
            'description' => 'required',
        ]);

        $photograph->title = $request->input('title');
        $photograph->description = $request->input('description');
        $photograph->category_id = $request->input('category');
            $photograph->downloadable = $request->input('downloadable');
            //$photograph->save();
            if($photograph->save()){
                return redirect()->route('dashboard')->with('success',"Photograph data Successfully Updated!");
                }else{
                    return redirect()->route('dashboard')->with('error',"Error Happend Updating Photograph data! Please Try Again!");
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
        $photograph = Image::find($id);
        if($photograph->delete()){
            return redirect()->route('dashboard')->with('success','Photograph deleted sucessfully;');
        }
        return back()->with('error','Error happened while Photograph deleting ! Please try again.');
    }
}
