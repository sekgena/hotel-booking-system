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

Route::get('/', function () {
    return Redirect::route("login.form");
});

Route::get('/login', 'MainController@index')->name("login.form");
Route::get('/account', 'Auth\RegisterController@showRegistrationForm')->name("account.form");
Route::get('/logout', 'MainController@logout')->name("logout");
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/room/create', 'RoomController@index')->name('create.room.form');
Route::get('/guest/search/{roomId}/{query}', 'GuestController@search')->name('guest.search');
Route::get('/guest/add/{roomId}', 'GuestController@showAddGuestForm')->name('guest.form');
Route::get('/booking/checkin/{roomId}/{guestId}', 'BookingController@doCheckIn')->name('checkin');
Route::get('/booking/checkout/{roomId}', 'BookingController@doCheckOut')->name('checkout');
Route::get('/booking/rate', 'RatingController@showRatingScreen')->name('rating.form');

/**
 * Form Submissions
 */

Route::post('/login', 'Auth\LoginController@login')->name("login");
Route::post('/account', 'Auth\RegisterController@register')->name("account");
Route::post('/room/create', 'RoomController@postCreateRoom')->name('create.room');
Route::post('/guest/add/{roomId}', 'GuestController@doAddGuest')->name('guest.add');
Route::post('/booking/rate', 'RatingController@doRateBooking')->name('rating.add');

