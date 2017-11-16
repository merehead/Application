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
Route::get('/jobs', 'AboutController@job')->name('JobPage');
Route::get('/onepage', 'AboutController@onepage')->name('OnePage');
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

Route::post('/document/upload/{user_id?}','DocumentsController@upload')->name('UploadDocument');
Route::get('/document/{document}/download','DocumentsController@download')->name('DownloadDocument');
Route::get('/documents/{user_id?}','DocumentsController@GetDocuments')->name('GetDocuments');
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
Route::get('/unsubscribe/{id}', 'HomeController@unsubscribe')->name('unsubscribe');


Route::group(['middleware' => ['auth']], function () {
    //todo все роуты, на которые не могут заходить не залогиненные должны быть в этой группе
    //todo а не дублировать проверку на каждой странице
    Route::get('/bookings/{booking}/purchase', 'Bookings\PaymentsController@payment_form');
});



Route::group(['prefix' => 'admin','middleware'=> 'auth','namespace' => 'Admin'],function() {

    Route::get('/', 'AdminController@adminHomePage')->name('adminHomePage');

    Route::resource('/user','User\UserController', ['except' => ['show']]);
    Route::get('/user/getCarerImage/{id}','User\UserController@getCarerImage');
    Route::get('/user/page/{p?}','User\UserController@index')->name('user_pagination');;
    Route::resource('/booking','Booking\BookingController', ['only' => ['index']]);
    Route::resource('/blog','Blog\BlogController');
    Route::get('/user/review_management','ReviewManagementController@index')->name('ReviewManagement');

    Route::get('/financial','FinancialController@index')->name('financial');
    Route::get('/statistic','StatisticController@index')->name('statistic');
    Route::get('/fees','FeesController@index')->name('fees');
    Route::get('/post-codes','PostCodesController@index')->name('PostCodes');
    Route::post('/fees','FeesController@update')->name('feespost');
    Route::get('/holidays','HolidaysController@index')->name('holidays');
    Route::post('/holidays','HolidaysController@update')->name('holidaysPost');

    Route::get('/settings','SettingsController@index')->name('settingsAdmin');
    Route::post('/settings','SettingsController@update')->name('settingsAdminPost');

    Route::get('/carer-wages','CarerWagesController@index')->name('CarerWages');
    Route::post('/carer-wages','CarerWagesController@update')->name('CarerWagesPost');


    Route::get('/booking-transactions', 'AdminSitePayment@getBookingTransactions')->name('BookingTransactions');
    Route::post('/booking-transactions', 'AdminSitePayment@getBookingTransactions')->name('BookingTransactionsPost');

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

Route::get('/test_sms', function (){
//    dd(SmsTools::send('Testing sms', '+380683301894'));
//    dd(SmsTools::getStatus('api2eff5c175ea2d30a1dc8301a05f66cd7eb380df4a'));
//    $res = \Illuminate\Support\Facades\DB::select("SELECT id FROM appointments WHERE UNIX_TIMESTAMP(STR_TO_DATE(CONCAT(DATE_FORMAT(date_start, '%Y-%m-%d'), ' ', time_from), \"%Y-%m-%d %H.%i\")) - UNIX_TIMESTAMP(NOW()) <= 3600 AND reminder_sent = 0");
//    if($res){
//        foreach ($res[0] as $appointmentId){
//            $appointment = \App\Appointment::find($appointmentId);
//            $carerProfile = $appointment->booking->bookingCarerProfile;
//            $serviceUserProfile = $appointment->booking->bookingServiceUser;
//            $purchaserProfile = $appointment->booking->bookingPurchaserProfile;
//
//            //send to carer
//            $message = 'Hi, '.$carerProfile->full_name.'. We just wanted to remind you that you have an appointment with '.$serviceUserProfile->full_name.' at '.$appointment->formatted_time_from.' today.';
//            SmsTools::sendSmsToCarer($message, $carerProfile);
//
//            if($serviceUserProfile->hasMobile()){
//                //end to service user
//                $message = 'Hi, '.$serviceUserProfile->full_name.'. We just wanted to remind you that '.$carerProfile->full_name.' will be visiting you at '.$appointment->formatted_time_from.' today.';
//                SmsTools::sendSmsToServiceUser($message, $serviceUserProfile);
//            } else {
//                //send to purchaser
//                $message = 'Hi, '.$purchaserProfile->full_name.'. We just wanted to remind you that '.$carerProfile->full_name.' will be visiting '.$serviceUserProfile->full_name.' at '.$appointment->formatted_time_from.' today.';
//                SmsTools::sendSmsToPurchaser($message, $purchaserProfile);
//            }
//
//            $appointment->reminder_sent = true;
//            $appointment->save();
//        }
//    }
});
