<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\User;
use Laravel\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Storage;
use Laravel\Http\Controllers\NotificationsController;
use Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $role = Role::find($user->role_id);
        return view('user.profile')->with(['user'=>$user,'role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user',$user);
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
        $user = User::find($id);
        $this->validate($request,['name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address'=>'required',
            'telephone'=>'required|size:10',
            'password' => 'required|string',
        ]);

        if(Auth::attempt(array('id'=>$id,'password'=>$request->input('password')))){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->telephone = $request->input('telephone');
            $user->save();
            NotificationsController::send(1,$user->id,"has successfully updated your user data!",null,'photographer');
            return redirect()->route('users.show',['user'=>$user->id])->with('success',"User profile data updated successfully!");
        }else{
            return redirect()->route('users.edit',['user'=>$user->id])->withErrors(['password'=>'Password mismatched ! Add new data again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id,$password)
    {
        $password = trim($password);
        $user = User::find($id);
        if(Auth::attempt(array('id'=>$id,'password'=>$password))){
            NotificationsController::sendMail($user->id,"LensView Removed Your Account!",null,'deleteuser');
            $user->delete();
            return "success";
        }else{
            return "error";
        }
        
    }

    public function picture($id){
        $user = User::find($id);
        return view('user.profilepic')->with('user',$user);
    }

    public function picupdate(Request $request)
    {
        $this->validate($request,[
            'upload_img' => 'required|image|max:1999|' //dimensions:ratio=1
        ]);

        $id = $request->input('id');
        $user = User::find($id);

        //delete old file
        if($user->profile_pic != 'default_user_image.jpg'){
            Storage::delete('public/profile_pics/'.$user->profile_pic);
            }

        $user->profile_pic = FilesController::upload($request,'upload_img','profile_pics','default_user_image.jpg',250,250);
        $user->save();
        NotificationsController::send(1,$user->id,"has successfully updated your profile picture!",null,'photographer');
        return redirect()->route('users.show',['id'=>$user->id])->with('success',"User Profile picture changed Successfully!");
    }

    public function changepassview(){
        return view('user.changepass');
    }

    public function updatepassword(Request $request){
        $oldpass = $request->input('old-password');
        $user = User::find(Auth::user()->id);
        $this->validate($request,['old-password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if(Auth::attempt(array('id'=>$user->id,'password'=>$oldpass))){
            $user->password = bcrypt($request->input('password'));
            $user->save();
            NotificationsController::send(1,$user->id,"has successfully changed your password!",null,'photographer');
            return redirect()->route('users.show',['user'=>$user->id])->with('success',"User Password changed Successfully!");
        }else{
            return redirect()->route('changepass')->withErrors(['old-password'=>'User password mismatched. Please try again !']);
        }
    }
}
