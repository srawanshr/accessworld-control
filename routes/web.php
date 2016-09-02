<?php

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

/*
|--------------------------------------------------------------------------
| Password reset link request routes
|--------------------------------------------------------------------------
*/
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

/*
|--------------------------------------------------------------------------
| Password reset routes
|--------------------------------------------------------------------------
*/
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

/*
|--------------------------------------------------------------------------
| User activation routes
|--------------------------------------------------------------------------
*/
Route::get('activate/{token}', 'Auth\UserActivationController@activate');
Route::post('activate/email/{user}', 'Auth\UserActivationController@sendActivationLinkEmail');

/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
*/
Route::get('', 'HomeController@index')->name('home');
