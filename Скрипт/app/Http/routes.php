<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'GeneralController@index');
Route::get('/terms', 'GeneralController@terms');
Route::get('/policy', 'GeneralController@policy');
Route::get('/help', 'GeneralController@help');
Route::get('/profile', 'GeneralController@profile');
Route::get('/profile/pays', 'GeneralController@profile_finance');
Route::get('/profile/withdraws', 'GeneralController@profile_withdraws');
Route::get('/profile/partner', 'GeneralController@profile_partner');
Route::get('/user/{id}', 'GeneralController@user_page');
Route::get('/test', 'GeneralController@test');



Route::post('/game/start', 'GeneralController@start');
Route::post('/game/continue', 'GeneralController@game_continue');
Route::post('/game/end', 'GeneralController@game_end');



Route::post('/api/stats', 'GeneralController@stats');
Route::get('/api/get_drop', 'GeneralController@get_drop');
Route::post('/api/drop', 'GeneralController@drop');



Route::post('/user/history', 'GeneralController@history');
Route::post('/payment/create', 'GeneralController@payment_create');
Route::post('/payout/create', 'GeneralController@payout_create');
Route::post('/promocode/activate', 'GeneralController@activate');


Route::get('/getPayment', 'GeneralController@get_payment');
Route::get('/success', 'GeneralController@success');



Route::group(['prefix' => '/admin', 'middleware' => 'Access:admin'], function() {
    Route::get('/', 'AdminController@index'); // +
    Route::get('/settings', 'AdminController@settings'); // +
    Route::get('/saveSettings', 'AdminController@saveSettings'); // +
    Route::get('/lastOpen', 'AdminController@lastOpen'); // +
    Route::get('/lastWithdraw', 'AdminController@lastWithdraw'); // +
    Route::get('/users', 'AdminController@users'); // +
    Route::get('/user/{id}', 'AdminController@user'); // +
    Route::get('/saveUser', 'AdminController@saveUser'); // +
    Route::get('/acceptWithdraw/{id}', 'AdminController@acceptWithdraw'); // +
    Route::get('/declineWithdraw/{id}', 'AdminController@declineWithdraw'); // +
    Route::get('/lastOrders', 'AdminController@lastOrders'); // +
});




Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@vklogin']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'LoginController@logout');
});