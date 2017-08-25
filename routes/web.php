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





Route::get('customer-registration/{step_token?}', 'Registration\CustomerRegistrationController@index');
Route::post('customer-registration/ajax', 'Registration\CustomerRegistrationController@ajax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//----
Route::get('/', 'HomePageController@index')->name('mainHomePage');
Route::get('/im-carer', 'CarerController@index')->name('ImCarerPage');

Route::get('carer-registration','CarerRegistrationController@index')->name('CarerRegistration');
Route::post('carer-registration','CarerRegistrationController@update')->name('CarerRegistrationPost');

Route::group(['prefix' => 'admin','middleware'=> 'auth','namespace' => 'Admin'],function() {

    Route::get('/', 'AdminController@index')->name('index');

    Route::resource('/user','User\UserController', ['except' => ['show']]);
    Route::resource('/booking','Booking\BookingController', ['only' => ['index']]);
    Route::resource('/dispute-payout','DisputePayout\DisputePayoutController', ['only' => ['index']]);


    Route::get('/dispute-payout-to-carer/{appointmentId}/{userId}/{amount}', 'AdminSitePayment\AdminSitePayment@DisputePayoutToCarer')->name('DisputePayoutToCarer');
    Route::get('/dispute-payout-to-purchaser/{appointmentId}/{userId}/{amount}', 'AdminSitePayment\AdminSitePayment@DisputePayoutToPurchaser')->name('DisputePayoutToPurchaser');



});