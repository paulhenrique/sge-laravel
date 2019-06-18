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

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//participantes
Route::get('register\participante', 'Auth\RegisterController@showRegistrationForm')->name('register_participante');
Route::post('register', 'Auth\RegisterController@register_participante');
//admin
Route::get('register\admin', 'Auth\RegisterController@showRegistrationForm')->name('register_admin');
Route::post('register', 'Auth\RegisterController@register_admin');
//ministrante
Route::get('register\ministrante', 'Auth\RegisterController@showRegistrationForm')->name('register_ministrante');
Route::post('register', 'Auth\RegisterController@register_ministrante');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
