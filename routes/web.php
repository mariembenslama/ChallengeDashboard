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

Route::get('/register', function () {
    return view('pages.General.register');
});

Route::get('/login', function () {
    return view('pages.General.login');
});

Route::resource('/challenges', 'ChallengeController');
Route::get('/listguests', 'AdminController@fetchGuests');
Route::get('/listguests/{idGuest}', 'AdminController@showGuest');
Route::get('/listorganizers', 'AdminController@fetchOrganizers');
Route::get('/listorganizers/{idOrganizer}', 'AdminController@showOrganizer');
Route::resource('/mychallenges', 'GuestController');
Route::resource('/organizerchallenges', 'OrganizerController');
Route::get('editchallenge/{idChallenge}', 'OrganizerController@edit');
Route::get('/createchallenge', 'OrganizerController@store');


 
Route::get('/challenges/search', function () {
    return "this is challenge search page";
});

