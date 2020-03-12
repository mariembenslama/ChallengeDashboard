<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/', 'HomeController');
Route::resource('/register', 'Auth\RegisterController');
Route::resource('/login', 'Auth\LoginController');
Route::resource('/challenges', 'ChallengeController');
Route::get('challenges/create', function(){
    return view('pages.Challenge.createChallenge');
});
Route::get('{id}/edit', 'ChallengeController@edit');
Route::post('/create','CommentController@store');
Route::resource('challenges/{id}/submit', 'ParticipantController');
Route::get('challenges/{id}/codes', 'ParticipantController@show');
Route::patch('challenges/{id}/codes/decide', 'ParticipantController@update');
Route::resource('/authority', 'AdminController');


Route::get('/listguests', 'AdminController@fetchGuests');
Route::get('/listguests/{id}', 'AdminController@showGuest');
Route::get('/listorganizers', 'AdminController@fetchOrganizers');
Route::get('/listorganizers/{id}', 'AdminController@showOrganizer');

// Route::resource('/mychallenges', 'GuestController');
Route::resource('/organizerchallenges', 'OrganizerController');
Route::resource('/guestchallenges', 'GuestController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');