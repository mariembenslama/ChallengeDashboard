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
Route::resource('/challenges', 'ChallengeController')->middleware('auth')->middleware('AdminOrganizerParticipant');
Route::get('challenges/create', function(){
    return view('pages.Challenge.createChallenge');
})->middleware('auth')->middleware('AdminOrganizer');
Route::get('{id}/edit', 'ChallengeController@edit')->middleware('auth')->middleware('AdminOrganizer');
Route::post('/create','CommentController@store')->middleware('auth')->middleware('AdminOrganizerParticipant');
Route::resource('challenges/{id}/submit', 'ParticipantController')->middleware('auth')->middleware('Participant');;
Route::get('challenges/{id}/codes', 'ParticipantController@show')->middleware('auth')->middleware('AdminOrganizerParticipant');
Route::patch('challenges/{id}/codes/decide', 'ParticipantController@update')->middleware('auth')->middleware('AdminOrganizer');
Route::resource('/authority', 'AdminController')->middleware('auth')->middleware('Admin');
Route::post('/search', 'ChallengeController@search')->middleware('auth')->middleware('AdminOrganizerParticipant');;
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');