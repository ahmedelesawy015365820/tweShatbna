<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

 Route::group([ 'prefix' => 'v1','middleware' => ['secretAPI','changeLang']],function () {

     // start Dashboard auth
     Route::group([ 'prefix' => 'auth','namespace' => 'Dashboard'],function () {

         // start login

         Route::post('login','AuthDashboardController@login');

     });

     // start web auth
     Route::group(['prefix' => 'web','namespace' => 'Web'],function () {

         // start Register[company,design,advertiser]

         Route::post('company','RegisterController@companyRegister');
         Route::post('design','RegisterController@designRegister');
         Route::post('advertiser','RegisterController@advertiserRegister');
         Route::get('country','RegisterController@country');
         Route::get('state/{state}','RegisterController@state');

         // start Login[company,design,advertiser]

         Route::post('login','AuthController@login');

         // start reset[Dashboard,company,design,advertiser]

         Route::post('forgot-password', 'AuthController@forgotPassword');
         Route::post('reset-password', 'AuthController@reset');

     });


    // api token_access

     Route::middleware(['auth:api','verified'])->group(function () {

        // start Dashboard
         Route::group(['prefix' => 'dashboard','namespace' => 'Dashboard'],function () {

             // start User
             Route::apiResource('user','UserController');

             // start role
             Route::resource('role','RoleController');

             // start advertiser
             Route::resource('advertiserPackage','PackageController');
             Route::post('advertiserPackage/statusPackage','PackageController@statusPackage');

             // start package sale
             Route::resource('packageSale','PackageSaleController');
             Route::post('packageSale/accept','PackageSaleController@accept');
             Route::post('packageSale/check','PackageSaleController@check');
             Route::post('packageSale/complete','PackageSaleController@complete');

             // start Advertise Schedule
             Route::resource('scheduleAdvertise','AdvertiserScheduleController')->except('show');
             Route::get('scheduleAdvertise/getALL','AdvertiserScheduleController@getALL');

         });

         // start web
         Route::group(['prefix' => 'web','namespace' => 'Web'],function () {

             // start verify[company,design,advertiser]
            //  Route::post('email/verification-notification', 'AuthController@sendVerificationEmail');
            //  Route::get('verify-email/{id}/{hash}',  'AuthController@verify')->name('verification.verify');

            // start Advertise
             Route::get('webadvertise',  'AdvertiseController@advertise');
             Route::get('package',  'AdvertiseController@index');
             Route::post('buy_package',  'AdvertiseController@buy_package');
             Route::get('numPackage',  'AdvertiseController@numPackage');
             Route::get('salePackage',  'AdvertiseController@package');

             // start DeSign
             Route::get('degreeService',  'DesignController@degreeService');
             Route::post('trustDesginOne',  'DesignController@trustDesginOne');
             Route::post('trustDesginTwe',  'DesignController@trustDesginTwe');
             Route::post('trustDesginThree',  'DesignController@trustDesginThree');

         });


         //start logout
         Route::group([ 'prefix' => 'auth','namespace' => 'Dashboard'],function () {

             // start login
             Route::post('logout','AuthDashboardController@logout');

         });

     });

 });


