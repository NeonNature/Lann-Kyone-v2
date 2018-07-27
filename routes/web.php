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
	if(Auth::check())
	{
		return view('main');
	}
    return redirect('login');
});

Route::get('test', function() {
	return view('tests');
});

Route::get('login','UserController@login');
Route::post('user/login','UserController@loginAuth');
Route::resource('user','UserController');

Route::get('booking/last/{id}', 'BookingController@getLastBooking');
Route::resource('booking', 'BookingController');

Route::get('testevent', function () {
	event(new App\Events\StatusLiked('Someone'));
    return "event sent";
});