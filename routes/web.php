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
Route::get('/', function () {
    return view('partials.frontend.index');
});


// backend routes
Route::get('/admin/', function() {
    return view('partials.backend.index');
});
Route::get('/admin/info', 'Backend\InfoController@index');
