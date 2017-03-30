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

// sites routes
Route::get('/sites', 'SiteController@index');
Route::get('/site/{site}/edit', 'SiteController@edit');
Route::post('/site/{site}/update', 'SiteController@update');
Route::get('/sites/new', 'SiteController@new');
Route::post('/sites/create', 'SiteController@create');
Route::get('/site/{site}/summary', 'SiteController@summary');


// pages routes
Route::get('/site/{site}/pages', 'PageController@index');
Route::get('/site/{site}/pages/new', 'PageController@new');
Route::post('/site/{site}/pages/create', 'PageController@create');
Route::get('/page/{page}/edit', 'PageController@edit');
Route::post('/page/{page}/update', 'PageController@update');


// color routes
Route::get('/site/{site}/colors', 'ColorController@index');
Route::get('/site/{site}/colors/new', 'ColorController@new');
Route::post('/site/{site}/colors/create', 'ColorController@create');
Route::get('/color/{color}/edit', 'ColorController@edit');
Route::post('/color/{color}/update', 'ColorController@update');

// preview routes
Route::get('/site/{site}/preview', 'SiteController@preview');
Auth::routes();

Route::get('/home', 'SiteController@index');

Route::get('/image/test', 'PageController@image');
Route::post('/image/upload', 'PageController@uploadImage');

// images?
// Route::get('/storage/{path}/{file}', [
//   'as' => 'image',
//   'uses' => 'PageController@getImage'
//   ]);

// Route::get('/test', 'SiteController@test');
Route::get('/error', 'SiteController@error');