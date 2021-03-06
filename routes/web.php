<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ReservationController@index');
Route::post('/getMaids', 'ReservationController@getMaids');
Route::post('/saveReservation', 'ReservationController@saveReservation');
Route::get('/ticket/{token}', 'ReservationController@getReservation');
Route::post('/ticket/cancel', 'ReservationController@deleteReservation');