<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
    ->namespace('Admin')
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/developers', 'DeveloperController');
    Route::resource('/messages', 'MessageController');
    Route::resource('/reviews', 'ReviewController');
});

Route::middleware('guest')
    ->namespace('Guest')
   ->name('guest.')
   ->prefix('guest')
   ->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/developers', 'DeveloperController');
    Route::resource('/messages', 'MessageController');
    Route::resource('/reviews', 'ReviewController');
});

Route::get('/', function () {
     return view("guest.home");
});
Route::view("home","admin/developers/index");

