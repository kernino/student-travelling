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
    return view("partials.frontend.inlogScherm", ["bError" => false]);
})->name("login");
Route::get('/savecode', 'HomeController@saveTravelCode')->name("saveCode");
Route::get('/accepted', 'HomeController@readAndAccepted')->name("accepted");
Route::get('/', 'HomeController@getHomeData')->name("home");
Route::get('/algemeneinfo', 'InfoController@showAlgemeneInfo')->name("algemeen");
Route::get('/hotelinfo', 'HotelController@getHotelData')->name("hotel");
Route::get('/hotelinfo/{id}', 'HotelController@getHotelData')->name("hotelInfo");
Route::get('/vervoerinfo', 'AutoController@getAutoData')->name("vervoer");
Route::get('/planning', 'PlanningController@getTripPlanning')->name("planning");
Route::get('/planning/{id}', 'PlanningController@getDayPlanning')->name("DayPlanning");
Route::get('/contact', 'ContactController@getContacts')->name("contact");




// backend routes
Route::get('/admin/', function() {
    return view('partials.backend.index');
})->name('home_backend');
Route::get('/admin/info', 'InfoController@index')->name("info_backend");
Route::post('/admin/info', 'InfoController@createInfo');

Route::get('/admin/vervoer', 'VervoerController@index')->name('vervoer_backend');
Route::post('/admin/vervoer', 'VervoerController@create');

Route::get('/admin/planning', 'PlanningController@GetAllPlanningen')->name("planningen");
Route::get('/admin/planningWijzig/{id}/{dagnr}', 'PlanningController@GetPlanning')->name("planningWijzig");
Route::post('/admin/planningWijzig/{id}', 'PlanningController@CUD');
Route::post('/admin/planning', 'PlanningController@CUD');

Route::get('/admin/hotel', 'HotelController@hotelBackEnd')->name('hotel_backend');
Route::post('/admin/hotel', 'HotelController@hotelBackEnd');

