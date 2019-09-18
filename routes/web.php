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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/

// Home
Route::name('home')->get('/', 'Front\CardController@index');

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Back')->group(function () {

   //Route::middleware('admin')->group(function () {
   Route::middleware('auth')->group(function () {
   	  Route::name('dashboard')->get('/dashboard', 'AdminController@index');
      //Route::name('dashboard')->get('/dashboard', 'AdminController@index')->middleware('admin');
      Route::resource('cards', 'AdminController');
      Route::name('update')->put('update/{card}', 'AdminController@update');   
      Route::name('editprofile')->get('editprofile', 'UserController@editprofile');
      Route::name('updateprofile')->post('updateprofile', 'UserController@updateprofile');
      Route::name('destroyprofile')->post('destroyprofile', 'UserController@destroyprofile');         
   });

});

