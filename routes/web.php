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
Route::get('/', 'PageController@index');
Route::get('/about', function() {
    return view ('site.about');
});
Route::get('/support', function() {
    return view ('site.support');
});

Route::get('/faq', function() {
    return view ('site.faq');
});

Route::get('login', 'Auth\LoginController@loginPage')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@registerPage')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::prefix('dash')->group(function() {
    Route::group(['middleware' => ['auth:user']], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('coin/purchase', 'CoinController@purchasePage');
    Route::post('coin/payment/confirm', 'CoinController@confirmPayment');
    Route::get('coin/transfer', 'CoinController@transferPage');
    Route::post('coin/transfer', 'CoinController@transfer');

    Route::get('coin/receive', 'CoinController@receivePage');
    Route::get('coin/transaction/history', 'CoinController@transactionHistoryPage');

    Route::get('minning/activity', 'MiningController@minningActivityPage');
    Route::post('minning/licence/payment/confirm', 'MiningController@confirmLicencePayment');

    Route::get('data/purchase', 'DataPurchaseController@dataPurchasePage');
    Route::post('data/payment/confirm', 'DataPurchaseController@confirmPayment');

    Route::get('user/profile', 'ProfileController@index');
    Route::post('user/profile/update', 'ProfileController@update');

    Route::get('support', 'SupportController@supportPage');
    Route::post('support', 'SupportController@create');



     });
});


//Admin routes
Route::get('admin/login',  'Auth\Admin\LoginController@showAdminLoginForm')->name('admin-login');
Route::post('admin/login', 'Auth\Admin\LoginController@adminLogin');
Route::prefix('/admin')->group(function() {
    Route::group(['middleware' => 'auth:admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('users', 'UserController@usersPage');
        //AJAX CALL
    Route::post('user/status/update', 'UserController@updateUserStatus');

    Route::get('settings', 'SettingsController@index');
    Route::post('settings', 'SettingsController@update');

    Route::get('miners', 'MiningController@getMiners');

    Route::get('coin/transfer', 'CoinController@transferPage');
    Route::post('coin/transfer', 'CoinController@transfer');

    Route::get('coin/transaction/history', 'CoinController@transactionHistoryPage');


    Route::get('data/history', 'DataPurchaseController@dataPurchaseHistoryPage');
    Route::get('support/messages', 'SupportController@messagesPage');





    });
});

//tests
Route::get('test/check-balance', 'TestController@checkClubKashBalance');



//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});