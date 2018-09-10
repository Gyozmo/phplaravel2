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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@showposts');

Route::get('/create', 'PostController@createposts')->middleware('auth');
Route::post('/create', 'PostController@storeposts')->middleware('auth');

Route::get('/edit/{id}', 'PostController@editposts')->middleware('auth');

Route::get('/remove/{id}', 'PostController@removeposts')->middleware('auth');

Route::get('/onepost/{id}', 'PostController@showonepost')->middleware('auth');
Route::post('/addcomments', 'PostController@addcomments')->middleware('auth');

Route::get('/deletecom', 'PostController@deletecom');
Route::post('/editcom', 'PostController@editcom');