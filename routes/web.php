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
//---- static page ----
Route::get('/about', 'AboutController@index')->name('AboutPage');
Route::get('/faq', 'FaqController@index')->name('FaqPage');
Route::get('/contact', 'ContactController@index')->name('ContactPage');
Route::get('/contact/thank', 'ContactController@thank')->name('ThankPage');
Route::post('/contact', 'ContactController@send')->name('ContactSendMail');
Route::get('/blog', 'BlogController@index')->name('BlogPage');
Route::get('/blog/filter/{month}-{year}', 'BlogController@viewFilter')->name('BlogFilter');
Route::get('/blog/{blogId}', 'BlogController@view')->name('BlogViewPage');

Route::get('/terms', 'TermsController@index')->name('TermsPage');

Route::get('/welcome-carer', 'CarerController@welcome')->name('welcomeCarer');
Route::get('/carer-settings', 'CarerController@index')->name('carerSettings'); //synonym for ImCarerPage
Route::get('/carer-settings/profile', 'CarerController@profile')->name('carerPublicProfile'); //synonym for ImCarerPage
Route::get('/carer-settings/booking', 'CarerController@booking')->name('carerBooking'); //synonym for ImCarerPage
Route::get('/carer-settings/booking/{status}', 'CarerController@bookingFilter')->name('carerBookingStatus'); //synonym for ImCarerPage

Route::get('/im-carer', 'CarerController@index')->name('ImCarerPage');
Route::post('/im-carer', 'CarerController@update')->name('ImCarerPrivatePage');
Route::get('/carer/{carer_id}', 'CarerController@carerProfile');

//Route::get('carer-registration/{stepback?}','CarerRegistrationController@index')->name('CarerRegistration');
Route::get('carer-registration/','CarerRegistrationController@index')->name('CarerRegistration');
Route::post('carer-registration','CarerRegistrationController@update')->name('CarerRegistrationPost');


Route::get('/purchaser-settings', 'PurchaserController@index')->name('purchaserSettings');
Route::post('/purchaser-settings','PurchaserController@update')->name('purchaserSettingsPost');
Route::get('/purchaser-settings/booking', 'PurchaserController@booking')->name('purchaserBooking'); //synonym for ImCarerPage
Route::get('/purchaser-settings/booking/{status}', 'PurchaserController@bookingFilter')->name('purchaserBookingStatus'); //synonym for ImCarerPage

Route::get('/purchaser-registration/','PurchaserRegistrationController@index')->name('PurchaserRegistration');
Route::post('/purchaser-registration','PurchaserRegistrationController@update')->name('PurchaserRegistrationPost');

Route::get('/service-registration/{serviceUserProfile}','ServiceUserRegistrationController@index')->name('ServiceUserRegistration');
Route::post('/service-registration/{serviceUserProfile}','ServiceUserRegistrationController@update')->name('ServiceUserRegistration');

Route::get('/addServiceUser/','AddServiceUserController@create')->name('ServiceUserCreate');

Route::get('/serviceUser-settings/{serviceUserProfile}','ServiceUserPrivateProfileController@index')->name('ServiceUserSetting');
Route::get('/serviceUser/profile/{serviceUserProfile}','ServiceUserPrivateProfileController@profile')->name('ServiceUserProfilePublic');

Route::post('/serviceUser-settings/{serviceUserProfile}','ServiceUserPrivateProfileController@update')->name('ServiceUserSettingPost');
Route::get('/serviceUser-settings/booking/{serviceUserProfile}', 'ServiceUserPrivateProfileController@booking')->name('ServiceUserBooking'); //synonym for ImCarerPage
Route::get('/serviceUser-settings/booking/{serviceUserProfile}/{status}', 'ServiceUserPrivateProfileController@bookingFilter')->name('ServiceUserBookingStatus'); //synonym for ImCarerPage



Route::post('/document/upload','DocumentsController@upload')->name('UploadDocument');
Route::get('/documents','DocumentsController@GetDocuments')->name('GetDocuments');
Route::post('/profile-photo','ProfilePhotosController@uploadUserProfilePhoto');
Route::post('/service-user-profile-photo','ProfilePhotosController@uploadServiceUserProfilePhoto');

Route::group(['prefix' => 'admin','middleware'=> 'auth','namespace' => 'Admin'],function() {

    Route::get('/', 'AdminController@index')->name('index');

    Route::resource('/user','User\UserController', ['except' => ['show']]);
    Route::resource('/booking','Booking\BookingController', ['only' => ['index']]);
    Route::resource('/dispute-payout','DisputePayout\DisputePayoutController', ['only' => ['index']]);
    Route::resource('/blog','Blog\BlogController');
    #Route::resource('/blog/edit/{idBlog}','Blog\BlogController@edit', ['only' => ['edit']]);
    Route::resource('/carer-payout','CarerPayout\CarerPayoutController', ['only' => ['index']]);
    Route::resource('/purchaser-payout','PurchaserPayout\PurchaserPayoutController', ['only' => ['index']]);

   // Route::get('/blog/edit/{blogId}', 'Booking\BookingController@edit', ['except' => ['show']]);

    Route::get('/dispute-payout-to-carer/{appointmentId}/{userId}/{amount}', 'AdminSitePayment\AdminSitePayment@DisputePayoutToCarer')->name('DisputePayoutToCarer');
    Route::get('/dispute-payout-to-purchaser/{appointmentId}/{userId}/{amount}', 'AdminSitePayment\AdminSitePayment@DisputePayoutToPurchaser')->name('DisputePayoutToPurchaser');

    Route::get('/booking-payout-to-purchaser/{action}/{bookingId}/{amount}', 'AdminSitePayment\AdminSitePayment@BookingPayoutToPurchaser')->name('BookingPayoutToPurchaser');
    Route::get('/bonus-payout-to-purchaser/{action}/{bonusRecordId}/{amount}', 'AdminSitePayment\AdminSitePayment@BonusPayoutToPurchaser')->name('BonusPayoutToPurchaser');

    Route::get('/booking-payout-to-carer/{action}/{bookingId}/{amount}', 'AdminSitePayment\AdminSitePayment@BookingPayoutToCarer')->name('BookingPayoutToCarer');
    Route::get('/bonus-payout-to-carer/{action}/{bonusRecordId}/{amount}', 'AdminSitePayment\AdminSitePayment@BonusPayoutToCarer')->name('BonusPayoutToCarer');


});

Route::get('/test_document_upload', function (){
    return view('test_document_upload');
});