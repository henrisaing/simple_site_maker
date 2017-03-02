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
Route::get('/sites', 'SiteController@index');
Route::get('/sites/new', 'SiteController@new');
Route::post('/sites/create', 'SiteController@create');

Route::get('/site/{site}', 'PageController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
