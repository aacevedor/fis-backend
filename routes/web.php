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
