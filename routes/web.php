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

Route::get('/', function () {
    return view('pages.General.welcome');
});

Route::get('/about', function () {
    return view('pages.General.about');
});

Route::resource('/register', 'Auth\RegisterController');
Route::resource('/login', 'Auth\LoginController');

Route::resource('/challenges', 'ChallengeController');
Route::get('/listguests', 'AdminController@fetchGuests');
Route::get('/listguests/{id}', 'AdminController@showGuest');
Route::get('/listorganizers', 'AdminController@fetchOrganizers');
Route::get('/listorganizers/{id}', 'AdminController@showOrganizer');
// Route::resource('/mychallenges', 'GuestController');
Route::resource('/organizerchallenges', 'OrganizerController');
Route::resource('/guestchallenges', 'GuestController');
Route::get('/createchallenge', function(){
    return view('pages.Organizer.createChallenge');
});
Route::get('{id}/edit', 'OrganizerController@edit');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');