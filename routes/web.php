<?php
use App\Helpers\Facades\PaymentTools;
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
Route::get('/jobs', 'AboutController@job')->name('JobPage');
Route::get('/faq', 'FaqController@index')->name('FaqPage');
Route::get('/contact', 'ContactController@index')->name('ContactPage');
Route::get('/contact/thank', 'ContactController@thank')->name('ThankPage');
Route::post('/contact', 'ContactController@send')->name('ContactSendMail');
Route::get('/blog', 'BlogController@index')->name('BlogPage');
Route::get('/blog/filter/{month}-{year}', 'BlogController@viewFilter')->name('BlogFilter');
Route::get('/blog/{blogId}', 'BlogController@view')->name('BlogViewPage');

Route::get('/search', 'SearchController@index')->name('searchPage');
Route::post('/search', 'SearchController@index')->name('searchPagePost');
Route::get('/search/page/{page}', 'SearchController@index')->name('searchPagePaginate');
Route::post('/search/page/{page}', 'SearchController@index')->name('searchPagePaginatePost');

Route::get('/terms', 'TermsController@index')->name('TermsPage');

Route::get('/welcome-carer', 'CarerController@welcome')->name('welcomeCarer');
Route::get('/carer-settings/booking/{status?}', 'CarerController@bookingFilter')->name('carerBooking'); //synonym for ImCarerPage
Route::get('/carer-settings/{id?}', 'CarerController@index')->name('carerSettings'); //synonym for ImCarerPage

Route::get('/carer/profile/{user_id}', 'CarerController@profile')->name('carerPublicProfile'); //synonym for
Route::get('/address/', 'CarerController@address_autocomplete')->name('carerGetAddress'); //synonym for
Route::get('/noaddress/', 'CarerController@getNoAddress')->name('carerGetNoAddress'); //synonym for
Route::get('/carer/review/{user_id}', 'CarerController@review')->name('carerReview'); //synonym for
Route::get('/carer/appointment/{user_id}', 'CarerController@appointment')->name('carerAppointment'); //synonym for
// ImCarerPage

//Route::get('/carer-settings/booking/{status}', 'CarerController@bookingFilter')->name('carerBookingStatus'); //synonym for ImCarerPage

Route::get('/carer-settings/profile/{user_id}', 'CarerController@profile')->name('carerPublicProfile2'); //synonym for ImCarerPage




Route::get('/im-carer', 'CarerController@index')->name('ImCarerPage');
Route::post('/im-carer', 'CarerController@update')->name('ImCarerPrivatePage');
Route::get('/carer/{carer_id}', 'CarerController@carerProfile');

//Route::get('carer-registration/{stepback?}','CarerRegistrationController@index')->name('CarerRegistration');
Route::get('carer-registration/','CarerRegistrationController@index')->name('CarerRegistration');
Route::post('carer-registration','CarerRegistrationController@update')->name('CarerRegistrationPost');

Route::get('/purchaser-settings/booking/{status?}', 'PurchaserController@bookingFilter')->name('purchaserBookingStatus'); //synonym for ImCarerPage
Route::get('/purchaser-settings/{id?}', 'PurchaserController@index')->name('purchaserSettings');
Route::post('/purchaser-settings','PurchaserController@update')->name('purchaserSettingsPost');

Route::get('/purchaser-registration/','PurchaserRegistrationController@index')->name('PurchaserRegistration');
Route::post('/purchaser-registration','PurchaserRegistrationController@update')->name('PurchaserRegistrationPost');

Route::get('/service-registration/{serviceUserProfile}','ServiceUserRegistrationController@index')->name('ServiceUserRegistration');
Route::post('/service-registration/{serviceUserProfile}','ServiceUserRegistrationController@update')->name('ServiceUserRegistration');

Route::get('/addServiceUser/','AddServiceUserController@create')->name('ServiceUserCreate');

Route::get('/serviceUser-settings/{serviceUserProfile}','ServiceUserPrivateProfileController@index')->name('ServiceUserSetting');
Route::get('/serviceUser/profile/{serviceUsersProfile}','ServiceUserPrivateProfileController@profile')->name('ServiceUserProfilePublic');
Route::get('/serviceUser/delete/{serviceUserProfile}','ServiceUserPrivateProfileController@delete')->name('ServiceUserProfileDelete');

Route::post('/serviceUser-settings/{serviceUserProfile}','ServiceUserPrivateProfileController@update')->name('ServiceUserSettingPost');
//Route::get('/serviceUser-settings/booking/{serviceUserProfile}', 'ServiceUserPrivateProfileController@booking')->name('ServiceUserBooking'); //synonym for ImCarerPage
Route::get('/serviceUser-settings/booking/{serviceUserProfile}/{status?}', 'ServiceUserPrivateProfileController@bookingFilter')->name('ServiceUserBookingStatus'); //synonym for ImCarerPage

Route::post('/bookings','Bookings\BookingsController@create');
Route::put('/bookings/{booking}','Bookings\BookingsController@update');
Route::post('/bookings/calculate_price','Bookings\BookingsController@calculateBookingPrice');
Route::get('/bookings/{booking}/modal_edit', 'Bookings\BookingsController@getModalEditBooking');
Route::get('/bookings/{booking}/details', 'Bookings\BookingsController@view_details')->name('viewBookingDetails');
Route::get('/bookings/{booking}/purchase', 'Bookings\PaymentsController@payment_form');
Route::post('/bookings/{booking}/message','Bookings\BookingsController@create_message');
Route::post('/bookings/{booking}/setPaymentMethod','Bookings\BookingsController@setPaymentMethod')->name('setBookingPaymentMethod');
Route::post('/bookings/{booking}/accept', 'Bookings\BookingsController@accept');
Route::post('/bookings/{booking}/reject', 'Bookings\BookingsController@reject');
Route::post('/bookings/{booking}/cancel', 'Bookings\BookingsController@cancel');
Route::post('/bookings/{booking}/completed', 'Bookings\BookingsController@completed');
Route::get('/bookings/{booking}/leave_review', 'Bookings\BookingsController@leaveReviewPage');
Route::post('/bookings/{booking}/review', 'Bookings\BookingsController@createReview');

Route::post('/appointments/{appointment}/reject', 'Bookings\AppointmentsController@reject');
Route::post('/appointments/{appointment}/completed', 'Bookings\AppointmentsController@completed');

Route::post('/document/upload','DocumentsController@upload')->name('UploadDocument');
Route::get('/documents/{user?}','DocumentsController@GetDocuments')->name('GetDocuments');
Route::post('/profile-photo','ProfilePhotosController@uploadUserProfilePhoto');
Route::post('/service-user-profile-photo','ProfilePhotosController@uploadServiceUserProfilePhoto');


// registration mail
Route::get('/thank-you-carer', 'CarerRegistrationController@sendContinueRegistration')->name('thankYou'); //mail - continue registration
Route::get('/carer-registration-completed', 'CarerRegistrationController@sendCompleteRegistration')->name('welcomeNewCarer'); //mail - completed registration

Route::get('/thank-you', 'PurchaserRegistrationController@sendContinueRegistration')->name('thankYouUser'); //mail - continue registration
Route::get('/thank-you-user/{id}', 'ServiceUserRegistrationController@sendContinueRegistration')->name('thankYouSrvUser'); //mail - continue registration

Route::get('/user-registration-completed/{id}', 'ServiceUserRegistrationController@sendCompleteRegistration')->name('serviceUserRegistrationComplete'); //mail - completed registration
//^^^registration mail

Route::get('/invite/refer-users', 'ReferNewUserController@index')->name('inviteReferUsers');
Route::post('/invite/refer-users', 'ReferNewUserController@create')->name('inviteReferUsersPost');
Route::get('/invite/thank-you', 'ReferNewUserController@show')->name('thankForInvite');

Route::get('/privacy-policy', 'PrivacyPolicyController@index')->name('privacy_policy');
Route::get('/enter', 'LoginWindowController@index')->name('session_timeout');



Route::group(['prefix' => 'admin','middleware'=> 'auth','namespace' => 'Admin'],function() {

    Route::get('/', 'AdminController@adminHomePage')->name('adminHomePage');

    Route::resource('/user','User\UserController', ['except' => ['show']]);
    Route::resource('/booking','Booking\BookingController', ['only' => ['index']]);
    Route::resource('/blog','Blog\BlogController');

    Route::get('/financial','FinancialController@index')->name('financial');


    Route::get('/booking-transactions', 'AdminSitePayment@getBookingTransactions')->name('BookingTransactions');

    Route::get('/carer-payout', 'AdminSitePayment@getPayoutsToCarers')->name('PayoutsToCarers');
    Route::post('/carer-payout/{booking}', 'AdminSitePayment@makePayoutToCarer')->name('makePayoutToCarer');

    Route::get('/purchaser-payout', 'AdminSitePayment@getPayoutsToPurchasers')->name('PayoutsToPurchasers');
    Route::post('/purchaser-payout/{booking}', 'AdminSitePayment@makePayoutToPurchaser')->name('makePayoutToPurchaser');

    Route::get('/dispute-payout', 'DisputePayoutsController@index')->name('DisputePayouts');
    Route::put('/dispute-payout/{dispute_payout_id}/detailsOfDispute', 'DisputePayoutsController@setDetailsOfDispute');
    Route::put('/dispute-payout/{dispute_payout_id}/detailsOfDisputeResolution', 'DisputePayoutsController@detailsOfDisputeResolution');
    Route::post('/dispute-payout/{dispute_payout_id}/payoutToCarer', 'DisputePayoutsController@payoutToCarer');
    Route::post('/dispute-payout/{dispute_payout_id}/payoutToPurchaser', 'DisputePayoutsController@payoutToPurchaser');

    Route::get('/bonuses-carers', 'BonusController@getBonusesCarer')->name('BonusesCarers');
    Route::get('/bonuses-purchasers', 'BonusController@getBonusesPurchaser')->name('BonusesPurchasers');
    Route::post('/payout-bonus/{bonus_id}', 'BonusController@payoutBonus');
    Route::post('/cancel-bonus/{bonus_id}', 'BonusController@cancelBonus');
});

Route::get('/test_document_upload', function (){
    return view('test_document_upload');
});

Route::get('/appan', function (){
    return view('resources/views/Holm/purchaserProfiles/Booking/NewAnAppointment');
});

Route::get('/test_stripe', function (){

//    $res = PaymentTools::createCreditCardToken(['card_number' => '4000 0000 0000 0077','exp_month' => '12','exp_year' => '20','cvc' => '123']);//txn_1BGSwgDBFNDzp4kiNU6fZqB6
//    $res = PaymentTools::createCharge(2000, $res, 191);
//    $res = PaymentTools::getBalanceTransaction('txn_1BGSwgDBFNDzp4kiNU6fZqB6');
//    dd($res);
//    $res = PaymentTools::createTransfer('acct_1BEMdvAij8rTvtXk', 20000, 'Payment to carer 2');
//    $res = PaymentTools::deleteConnectedAccount('acct_1BDwrPHySv5f7qBn');

//    dd($res);
});

