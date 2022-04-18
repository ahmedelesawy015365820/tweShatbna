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

// Dashboard admin

Route::domain('admin.shatbna.com')->group(function () {

    Route::get('/', function () {
        return view('admin');
    });


    Route::get('{any}', function ($any) {
        return view('admin');
    })->where('any','.*');

});


// website

Route::get('/', function () {
    return view('web');
});


Route::get('{any}', function ($any) {
    return view('web');
})->where('any','.*');
