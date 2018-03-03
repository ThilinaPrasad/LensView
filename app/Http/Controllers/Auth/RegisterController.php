<?php

namespace Laravel\Http\Controllers\Auth;

use Laravel\User;
use Laravel\Models\Role;
use Laravel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Http\Controllers\FilesController;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address'=>'required',
            'telephone'=>'required|size:10',
            'role'=>'required',
            'condition'=>'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Laravel\User
     */
    protected function create(array $data)
    {
        if(count(Role::all())==0){
            Role::create([
                'id'=>'1',
                'name' =>'Voter'
            ]);
            Role::create([
                'id'=>'2',
                'name' =>'Photographer'
            ]);
            Role::create([
                'id'=>'3',
                'name' =>'Contest Organizer'
            ]);
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'telephone' => $data['telephone'],
            'role_id' => $data['role'],
            'profile_pic' => 'default_user_image.jpg',
            'password' => bcrypt($data['password']),
        ]);
    }
}
