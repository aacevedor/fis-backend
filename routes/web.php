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
    return view('welcome');
});

Route::get('devel', 'Controller@devel')->name('devel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'UsersController@change')->name('change');
Route::post('/user/credentials','UsersController@postCredentials')->name('save');


Route::get('login/facebook', 'UsersController@redirectToProvider')->name('login-facebook');
Route::get('login/facebook/callback', 'UsersController@handleProviderCallback');

Route::resource('api/citys', 'CitysController');
Route::resource('api/countrys', 'CountrysController');
Route::resource('api/services', 'ServicesController');
Route::resource('api/services-types', 'ServicesTypesController');
Route::resource('api/users', 'UsersController');
Route::resource('api/users-profile', 'UsersProfileController');

Route::resource('api/services-status', 'ServicesStatusController');
Route::resource('api/services-confirm', 'ServicesConfirmController');
Route::resource('api/services-comments', 'ServicesCommentsController');
Route::resource('api/push', 'PushNotificationController');



Route::get('api/user/confirmation/{ionic_id}', 'UsersController@confirmation')->name('user-confirmation');
Route::get('api/notification/{type}/{id}', 'UsersController@adminNotification')->name('user-change-rol');

Route::get('users', 'UsersProfileController@list')->name('users.list');

Route::get('users-profile/provider', 'UsersProfileController@providerList')->name('users.provider');

Route::get('services', 'ServicesController@list')->name('services.list');

Route::delete('services/{service}', 'ServicesController@delete')->name('services.delete');
