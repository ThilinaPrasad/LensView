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

Route::get('/test', function () {
    return view('auth.passwords.reset');
});

Route::get('/', "GuestsController@index");


Route::get('/unautherized', function () {
    return view('unautherized');
});


Auth::routes();

Route::get('/dashboard/{tab?}', 'DashboardController@index')->name('dashboard');
Route::resource('contests','ContestsController');

//contests & photographs Functions
Route::get('/photos','GuestsController@photos' );

Route::get('/votes/contests', 'ContestsController@vote');
Route::resource('photographs','PhotosController');
Route::get('photographs/upload/{contest_id?}', 'PhotosController@create');
Route::get('votes/photographs/{id?}', 'PhotosController@showVoting');

//winner
Route::get('/winners/contests', 'ContestsController@winnerContests');
Route::get('/winner/{id?}', 'ContestsController@showWinner');

//Review route
Route::post('/review', 'ContestsController@saveReview');

//Vote Functions
Route::get('/addvote/{id?}', 'VotesController@addVote');
Route::get('/removevote/{id?}', 'VotesController@removeVote');
Route::post('/graph', 'VotesController@loadGraph');

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

//Categories functions
Route::resource('categories','CategoriesController');

//Winner Controller
Route::get('/winnerselect/{contest?}/{img?}/{winner?}', 'WinnersController@select');

//Notification center
Route::get('/notificationcenter','NotificationsController@showAll');