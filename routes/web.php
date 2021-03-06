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

Route::get('/', function () {
    return view('frontend.index');
})->name('homepage');

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/optionvalues', 'OptionvalueController');
    Route::resource('/fields', 'FieldController');
    Route::resource('/forms', 'FormController');
    Route::resource('/timeslots', 'TimeslotController');
    Route::resource('/excludes', 'ExcludeController');
    Route::resource('/bookings', 'BookingController');
});
