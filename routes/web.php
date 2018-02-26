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



Route::get('/test', function () {
    return view('photos.vote');
});

Route::get('/unautherised', function () {
    return view('unautherised');
});

Route::get('/photos', function () {
    return view('photos.photos');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('contests','ContestsController');
Route::get('/votes/contests', 'ContestsController@vote');
Route::resource('photographs','PhotosController');
Route::get('photographs/upload/{contest_id?}', 'PhotosController@create');


Auth::routes();

