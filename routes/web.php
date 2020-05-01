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

Route::get('/','HomeController@shouthome')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shout', 'HomeController@shouthome')->name('shouthome');
Route::post('/savestatus', 'HomeController@savestatus')->name('shout.save');
Route::get('/profile', 'HomeController@showprofile')->name('profile');
Route::post('/profilesave', 'HomeController@saveprofile')->name('profile.save');
