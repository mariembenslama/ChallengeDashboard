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
Route::resource('/challenges', 'ChallengeController')->middleware('AdminOrganizerParticipant');
Route::get('challenges/create', function(){
    return view('pages.Challenge.createChallenge');
})->middleware('AdminOrganizer');
Route::get('{id}/edit', 'ChallengeController@edit')->middleware('AdminOrganizer');
Route::post('/create','CommentController@store')->middleware('AdminOrganizerParticipant');
Route::resource('challenges/{id}/submit', 'ParticipantController')->middleware('Participant');;
Route::get('challenges/{id}/codes', 'ParticipantController@show')->middleware('AdminOrganizerParticipant');
Route::patch('challenges/{id}/codes/decide', 'ParticipantController@update')->middleware('AdminOrganizer');
Route::resource('/authority', 'AdminController')->middleware('Admin');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');