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

/*
|--------------------------------------------------------------------------
| Admin User CRUD Routes
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'user.', 'prefix' => 'user'], function ()
{
    Route::get('', 'UserController@index')->name('index');
    Route::get('create', 'UserController@create')->name('create');
    Route::post('', 'UserController@store')->name('store');
    Route::get('{user}', 'UserController@show')->name('show');
    Route::get('{user}/edit', 'UserController@edit')->name('edit');
    Route::put('{user}', 'UserController@update')->name('update');
    Route::delete('{user}', 'UserController@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Admin User CRUD Routes
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'role.', 'prefix' => 'role'], function ()
{
    Route::get('', 'RoleController@index')->name('index');
    Route::get('create', 'RoleController@create')->name('create');
    Route::post('', 'RoleController@store')->name('store');
    Route::get('{role}', 'RoleController@show')->name('show');
    Route::get('{role}/edit', 'RoleController@edit')->name('edit');
    Route::put('{role}', 'RoleController@update')->name('update');
    Route::delete('{role}', 'RoleController@destroy')->name('destroy');
});
