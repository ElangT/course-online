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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/search', 'SearchController@index');

Route::post('/search', 'SearchController@search');

Route::get('/courses/{id}', ['uses'=>'CourseController@show']);

Route::get('/checkout', 'SnapController@snap');

Route::get('/snaptoken', 'SnapController@token')->middleware('ajax');

Route::post('/payment/notification', 'NotificationController@notify');

Route::post('/payment/finish', 'SnapController@finish');

Route::post('/payment/unfinish', 'SnapController@unfinish');

Route::post('/payment/error', 'SnapController@error');

Route::get('/addtocart', 'SnapController@addtocart');

Route::get('/snapreset', 'SnapController@reset');

Route::group(array('prefix' => 'provider'), function(){

	Route::get('/login', 'Auth\ProviderLoginController@showLoginForm')->name('provider.login');

	Route::post('/login', 'Auth\ProviderLoginController@login')->name('provider.login.submit');

	Route::post('/logout', "Auth\ProviderLoginController@logout")->name('provider.logout');

	Route::get('/register', 'Auth\ProviderRegisterController@showRegistrationForm')->name('provider.register');

	Route::post('/register', 'Auth\ProviderRegisterController@register')->name('provider.register.submit');

	Route::get('/dashboard', 'ProviderController@index')->name('provider.dashboard');

	Route::get('/createcourse', 'CourseController@create')->name('course.create')->middleware('auth:provider');

	Route::post('/createcourse', 'CourseController@store')->name('course.store.submit')->middleware('auth:provider');

	Route::get('/editcourse/{id}', 'CourseController@edit')->name('course.update')->middleware('auth:provider');

	Route::put('/editcourse/{id}', 'CourseController@update')->middleware('auth:provider');

	Route::post('/open/{id}', 'CourseController@open')->middleware('auth:provider');

	Route::post('/active/{id}', 'CourseController@active')->middleware('auth:provider');

	Route::post('/changepicture', 'ProviderController@changePict')->name('provider.image.upload');

	Route::get('/manage/{id}', 'CourseController@manage')->middleware('auth:provider');

	Route::put('/changestatus', 'CourseController@changestatus')->middleware('auth:provider')->name('status.change.submit');
});

Auth::routes();