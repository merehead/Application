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
    return view('pages.home.home');
});

Route::get('carer-registration', function () {
    return 'carer-registration';
});

Route::get('customer-registration/{step_token?}', 'Registration\CustomerRegistrationController@index');
Route::post('customer-registration/ajax', 'Registration\CustomerRegistrationController@ajax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix' => 'admin','middleware'=> 'auth','namespace' => 'Admin'],function() {

    Route::get('/', 'AdminController@index')->name('index');

    Route::resource('/user','User\UserController', ['except' => ['show']]);

});