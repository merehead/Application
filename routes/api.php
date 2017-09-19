<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/document/{document}','DocumentsController@update')->name('UpdateDocument');
Route::delete('/document/{document}','DocumentsController@destroy')->name('DeleteDocument');
Route::get('/document/{document}','DocumentsController@getDocument')->name('GetDocument');
Route::get('/document/{document}/preview','DocumentsController@getPreview')->name('GetDocument');
Route::post('/booking','Bookings\BookingsController@create');
Route::post('/booking/{booking}/setPaymentMethod','Bookings\BookingsController@setPaymentMethod');
