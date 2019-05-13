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

// frontend routes
Route::get('/', 'HomeController@getHomeData');


// backend routes
Route::get('/admin/', function() {
    return view('partials.backend.index');
})->name('home_backend');
Route::get('/admin/info', 'InfoController@index')->name("info_backend");
Route::post('/admin/info/algemeneinfo', 'InfoController@createInfo');
Route::post('/admin/info/vlucht', 'InfoController@createFlight');

Route::get('/admin/vervoer', 'AutoController@index')->name('vervoer_backend');
Route::post('/admin/vervoer', 'AutoController@create');
