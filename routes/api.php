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

         // start Register[company,design,advertiser,client]

         Route::post('company','RegisterController@companyRegister');
         Route::post('design','RegisterController@designRegister');
         Route::post('advertiser','RegisterController@advertiserRegister');
         Route::post('client','RegisterController@clientRegister');
         Route::get('country','RegisterController@country');
         Route::get('state/{state}','RegisterController@state');

         // start Login[company,design,advertiser]

         Route::post('login','AuthController@login');
         Route::post('loginClient','AuthController@loginClient');

         // start reset[Dashboard,company,design,advertiser,client]

         Route::post('forgot-password', 'AuthController@forgotPassword');
         Route::post('reset-password', 'AuthController@reset');

         // start newLetter
         Route::post('newLetter','NewsLetterController@newsLetter');
         Route::post('support','NewsLetterController@support');

         // start  privacy
         Route::get('privacy',  'PrivacyController@index');


     });


    // api token_access

     Route::middleware(['auth:api'])->group(function () {

        // start Dashboard
         Route::group(['prefix' => 'dashboard','namespace' => 'Dashboard'],function () {

             // start User
             Route::get('getAllNot','NotificationController@getAllNot');
             Route::get('getNotNotRead','NotificationController@getNotNotRead');
             Route::post('clearItem/{id}','NotificationController@clearItem');
             Route::post('getNotNotRead','NotificationController@clearAll');


             // start User
             Route::apiResource('user','UserController');

             // start role
             Route::resource('role','RoleController');

             // start advertiser
             Route::resource('advertiserPackage','PackageController');
             Route::post('advertiserPackage/statusPackage','PackageController@statusPackage');

             // start package sale
             Route::resource('packageSale','PackageSaleController');
             Route::post('packageSale/deleteOne/{id}','PackageSaleController@deleteOne');
             Route::post('packageSale/accept','PackageSaleController@accept');
             Route::post('packageSale/check','PackageSaleController@check');
             Route::post('packageSale/complete','PackageSaleController@complete');

             // start Advertise Schedule
             Route::resource('scheduleAdvertise','AdvertiserScheduleController')->except('show');
             Route::get('scheduleAdvertise/getALL','AdvertiserScheduleController@getALL');

             // start company
             Route::resource('trustCompany','CompanyController')->except(['destroy']);
             Route::post('trustCompany/status','CompanyController@status');
             Route::post('trustCompany/trust','CompanyController@trust');

             // start design
             Route::resource('trustDesign','DesignController')->except(['destroy']);
             Route::post('trustDesign/status','DesignController@status');
             Route::post('trustDesign/trust','DesignController@trust');

             // start advertise
             Route::resource('trustAdvertise','AdvertiseController')->except(['destroy']);

             // start client
             Route::resource('trustClient','ClientController')->except(['destroy']);
             Route::post('trustClient/status','ClientController@status');
             Route::post('trustClient/trust','ClientController@trust');

             // start New Letter
             Route::resource('newLetter','NewsLetterController')->except('show');

             // start New Letter
             Route::resource('support','SupportController')->except(['create','update','edit','store']);

             // start country
             Route::resource('country','CountryController')->except(['show','create']);

             // start state
             Route::resource('state','StateController')->except(['show']);

             // start privacy
             Route::resource('privacy','PrivacyController')->except(['show','create']);

             // start companyService
             Route::resource('companyService','CompanyServiceController')->except(['show','create']);

             // start degreeDesign
             Route::resource('degreeDesign','DegreeDesignController')->except(['show','create']);

             // start designService
             Route::resource('designService','DesignServiceController')->except(['show','create']);

             // start unity
             Route::resource('unity','UnityController')->except(['show','create']);

             // start architectural
             Route::resource('architectural','ArchitecturalController')->except(['show','create']);

             // start expected budget
             Route::resource('expected','ExpectedBudgetController')->except(['show','create']);

         });

         // start web
         Route::group(['prefix' => 'web','namespace' => 'Web'],function () {

             // start verify[company,design,advertiser]
              Route::post('email/verification-notification', 'AuthController@sendVerificationEmail');
              Route::get('verify-email/{id}/{hash}',  'AuthController@verify')->name('verification.verify');

            //auth User
             Route::get('user',  'AuthController@user');
             Route::get('complement',  'AuthController@complement');
             Route::get('partner',  'AuthController@partner');
             Route::post('changeImage',  'AuthController@changeImage');

            // start Advertise
             Route::get('webadvertise',  'AdvertiseController@advertise');
             Route::get('package',  'AdvertiseController@index');
             Route::post('buy_package',  'AdvertiseController@buy_package');
             Route::get('numPackage',  'AdvertiseController@numPackage');
             Route::get('salePackage',  'AdvertiseController@package');
             Route::get('getAll/{id}',  'AdvertiseController@getALL');

             // start DeSign
             Route::get('degreeService',  'DesignController@degreeService');
             Route::post('trustDesginOne',  'DesignController@trustDesginOne');
             Route::post('trustDesginTwe',  'DesignController@trustDesginTwe');

             // start DeSign profile
             Route::get('getBank',  'DesignEditProfile@getBank');
             Route::get('getInfo',  'DesignEditProfile@getInfo');
             Route::get('getDesignDetails',  'DesignEditProfile@getDesignDetails');
             Route::post('storeBank',  'DesignEditProfile@storeBank');
             Route::post('deleteBank/{id}',  'DesignEditProfile@deleteBank');
             Route::post('storeDesignDetail',  'DesignEditProfile@storeDesignDetail');
             Route::post('storeInfo',  'DesignEditProfile@storeInfo');
             Route::post('editPassword',  'DesignEditProfile@editPassword');

             // start  company and profile
             Route::get('companyService',  'CompanyController@companyService');
             Route::get('getCompanyDetails',  'CompanyController@getCompanyDetails');
             Route::post('storeCompanyDetail',  'CompanyController@storeCompanyDetail');
             Route::post('trustCompanyOne',  'CompanyController@companyOne');

             // start  client and profile
             Route::post('clientData',  'ClientController@clientOne');

             // start  addCompany and addDesign
             Route::get('getProject',  'AddProjectController@getService');
             Route::post('addCompany',  'AddProjectController@addCompany');
             Route::post('addDesign',  'AddProjectController@addDesign');


         });


         //start logout
         Route::group([ 'prefix' => 'auth','namespace' => 'Dashboard'],function () {

             // start login
             Route::post('logout','AuthDashboardController@logout');

         });

     });

 });



