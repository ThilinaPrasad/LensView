<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/unautherised', function () {
    return view('unautherised');
});


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('contests','ContestsController');

//contests & photographs Functions
Route::get('/photos', function () {
    return view('photos.photos');
});
Route::get('/votes/contests', 'ContestsController@vote');
Route::resource('photographs','PhotosController');
Route::get('photographs/upload/{contest_id?}', 'PhotosController@create');
Route::get('votes/photographs/{id?}', 'PhotosController@showVoting');

//Vote Functions
Route::get('/addvote/{id?}', 'VotesController@addVote');
Route::get('/removevote/{id?}', 'VotesController@removeVote');

//User functions
Route::resource('users','UsersController');
Route::get('/deleteuser/{id?}/{password?}', 'UsersController@delete');
Route::get('/profilepic/{id?}', 'UsersController@picture');
Route::put('/prfilepicupdate', 
          array('uses'=>'UsersController@picupdate',
                 'as' => 'profilepic.update'));

Route::get('/changepass',
array('uses'=>'UsersController@changepassview',
                 'as' => 'changepass'));
Route::put('/updatepassword', 
          array('uses'=>'UsersController@updatepassword',
                 'as' => 'changepass.updatepassword'));
Auth::routes();

//Notification handelling
Route::get('/read/{id?}', 'NotificationsController@read');
Route::get('/readall', 'NotificationsController@readAll');
