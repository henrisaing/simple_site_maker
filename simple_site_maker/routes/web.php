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
Route::get('/sites/new', 'SiteController@new');
Route::post('/sites/create', 'SiteController@create');
Route::get('/sites/{site}/summary', 'SiteController@summary');

// pages routes
Route::get('/site/{site}/pages', 'PageController@index');
Route::get('/site/{site}/pages/new', 'PageController@new');
Route::post('/site/{site}/pages/create', 'PageController@create');

// color routes
Route::get('/site/{site}/colors', 'ColorController@index');
Route::get('/site/{site}/colors/new', 'ColorController@new');
Route::post('/site/{site}/colors/create', 'ColorController@create');
Route::get('/color/{color}/edit', 'ColorController@edit');
Route::post('/color/{color}/update', 'ColorController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
