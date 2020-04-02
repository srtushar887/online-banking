<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontendController@index')->name('front');
Route::get('/about-us', 'FrontendController@about_us')->name('about.us');
Route::get('/contact-us', 'FrontendController@contact_us')->name('contact.us');
Route::post('/contact-us-sand', 'FrontendController@contact_use_send')->name('contact.send');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('/privacy-policy', 'FrontendController@privacy')->name('privacy');

Auth::routes();



//custom login
Route::post('/custom-login-user', 'CustomLoginController@login')->name('custom.login');
Route::get('/verify-pin-code', 'CustomLoginController@verify_pin')->name('verifypin');
Route::post('/pin-verify', 'CustomLoginController@verify_pin_code')->name('user.pin.verify');


Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', 'Admin\AdminController@general_settings')->name('admin.general.setting');
        Route::post('/general-settings-save', 'Admin\AdminController@general_settings_update')->name('genetaing.settings.update');

        //users
        Route::get('/users', 'Admin\AdminUserController@users')->name('admin.users');
        Route::get('/users-get', 'Admin\AdminUserController@users_get')->name('get.user');
        Route::get('/create-new-user', 'Admin\AdminUserController@create_new_user')->name('admin.create.new.user');
        Route::post('/create-new-user-save', 'Admin\AdminUserController@create_new_user_save')->name('create.user.save');
        Route::get('/view-user/{id}', 'Admin\AdminUserController@view_user')->name('view.user');
        Route::post('/user-pass-change', 'Admin\AdminUserController@pass_change')->name('admin.user.pass.change');
        Route::post('/user-account-action', 'Admin\AdminUserController@account_action')->name('admin.user.account.action');
        Route::post('/user-add-balance', 'Admin\AdminUserController@add_balance')->name('admin.user.add.balance');

        //fun transfer
        Route::get('/fund-transfer', 'Admin\AdminUserController@fund_transfr')->name('admin.fund.transfer');
        Route::get('/fund-transfer-get', 'Admin\AdminUserController@fund_transfr_get')->name('get.trans');
        Route::get('/transfer-details/{id}', 'Admin\AdminUserController@transfer_details')->name('view.transfer');
        Route::post('/send-code', 'Admin\AdminUserController@send_code')->name('admin.send.code');
        Route::post('/fund-action', 'Admin\AdminUserController@fund_action')->name('admin.fund.action');
        Route::get('/account-details', 'Admin\AdminUserController@account_details')->name('admin.account.details');
        Route::get('/account-details-get', 'Admin\AdminUserController@account_details_get')->name('get.account.details');
        Route::get('/profile', 'Admin\AdminUserController@profile')->name('admin.profile');
        Route::post('/profile-save', 'Admin\AdminUserController@profile_save')->name('admin.profile.save');
    });
});


Route::group(['middleware' => ['auth','userlgin']], function() {
    Route::group(['prefix' => 'home'], function (){

        Route::get('/', 'HomeController@index')->name('home');

        //transfer
        Route::get('/local-transfer', 'User\UserController@local_transfer')->name('user.local.transfer');
        Route::post('/local-transfer-save', 'User\UserController@local_transfer_save')->name('user.local.transfer.save');
        Route::get('/international-transfer', 'User\UserController@international_transfer')->name('user.international.transfer');
        Route::post('/international-transfer-save', 'User\UserController@international_transfer_save')->name('user.internatonal.transfer.save');
        Route::get('/enter-code', 'User\UserController@enter_code')->name('user.email.first.code');
        Route::post('/first-code-check', 'User\UserController@first_code_check')->name('first.code.check');
        Route::get('/cot-step', 'User\UserController@sencond_code')->name('second.code');
        Route::post('/ctmf-check', 'User\UserController@ctaf_check')->name('ctam.code.check');
        Route::get('/tax-code', 'User\UserController@tax_code')->name('taxcode');
        Route::post('/tax-code-check', 'User\UserController@tax_code_check')->name('tax.code.check');
        Route::get('/atc-code', 'User\UserController@atc_code')->name('atccode');
        Route::post('/atc-code', 'User\UserController@atc_code_check')->name('atc.code.check');
        Route::get('/mfc-code', 'User\UserController@mfc_code')->name('mfccode');
        Route::post('/mfc-code-check', 'User\UserController@mfc_code_check')->name('mfc.code.check');

        //transaction hostory
        Route::get('/account-summery', 'User\UserController@transaction_history')->name('user.transaction.history');
        Route::post('/check-summery', 'User\UserController@check_summery')->name('check.summery');
        Route::get('/credit-card', 'User\UserController@credit_card')->name('user.creditcard');
        Route::get('/profile', 'User\UserController@profile')->name('user.profile');
        Route::post('/profile-update', 'User\UserController@profile_update')->name('user.profile.save');
        Route::get('/change-pin', 'User\UserController@change_pin')->name('user.chang.pin');
        Route::post('/change-pin-save', 'User\UserController@change_pin_save')->name('user.pin.save');
        Route::get('/change-password', 'User\UserController@change_password')->name('user.change.password');
        Route::post('/change-password-save', 'User\UserController@change_password_save')->name('user.password.save');



    });
});
