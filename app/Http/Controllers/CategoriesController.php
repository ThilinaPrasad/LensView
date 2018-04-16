<?php

namespace Laravel\Http\Controllers;
use Laravel\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::pluck('name')->toArray();

        $this->validate($request,[
            'name'=>'required',
           ]);

        if(!in_array($request->input('name'), $categories)){
        $status = Category::create([
            'name'=>$request->input('name'),
            'creater_id'=>Auth::user()->id,
        ]);
        if($status){
            return redirect('/dashboard/category')->with(['success'=>$request->input('name')." category added successfully!",'tab'=>'category']);
        }else{
            return redirect('/dashboard/category')->with(['tab'=>'category','error'=>"Error happend whire adding data!"]);
        }
    }else{
        return redirect('/dashboard/category')->with(['tab'=>'category','error'=>$request->input('name')." category already exists!"]);
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
        $cat = Category::find($id);
        $name = $cat->name;
        if($cat->delete()){
           // NotificationsController::send(1,Auth::user()->id,"has successfully deleted your contest <b>".$title."</b> with your request",null,'organizer');
            return redirect('/dashboard/category')->with(['success'=>$name.' category deleted sucessfully!']);
        }
        return back()->with('error','Error happened while deleting ! Please try again.');
    }
}
