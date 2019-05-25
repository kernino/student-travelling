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
Route::get('/login', function(){
    return view("partials.frontend.inlogScherm");
})->name("login");
Route::get('/savecode', 'HomeController@saveTravelCode')->name("saveCode");
Route::get('/', 'HomeController@getHomeData')->name("home");
Route::get('/algemeneinfo', 'HomeController@getHomeData')->name("algemeen");
Route::get('/hotelinfo', 'HotelController@getHotelData')->name("hotel");
Route::get('/vervoerinfo', 'AutoController@getAutoData')->name("vervoer");
Route::get('/planning', 'HotelController@getHomeData')->name("planning");
Route::get('/contact', 'HotelController@getHomeData')->name("contact");




// backend routes
Route::get('/admin/', function() {
    return view('partials.backend.index');
})->name('home_backend');
Route::get('/admin/info', 'InfoController@index')->name("info_backend");
Route::post('/admin/info/save', 'InfoController@createInfo');
//Route::post('/admin/info/vlucht', 'InfoController@createFlight');

Route::get('/admin/vervoer', 'VervoerController@index')->name('vervoer_backend');
Route::post('/admin/vervoer', 'VervoerController@create');

Route::get('/admin/planning', 'PlanningController@GetAllPlanningen');
