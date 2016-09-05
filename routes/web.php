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

Route::group(['middleware' => 'auth'], function ()
{
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
    | Role CRUD Routes
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

    /*
    |--------------------------------------------------------------------------
    | Service CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'service.', 'prefix' => 'service'], function ()
    {
        Route::get('', 'ServiceController@index')->name('index');
        Route::get('create', 'ServiceController@create')->name('create');
        Route::post('', 'ServiceController@store')->name('store');
        Route::get('{service}/edit', 'ServiceController@edit')->name('edit');
        Route::put('{service}', 'ServiceController@update')->name('update');
        Route::delete('{service}', 'ServiceController@destroy')->name('destroy');
    });

    /*
        |--------------------------------------------------------------------------
        | Service Package CRUD Routes
        |--------------------------------------------------------------------------
        */
    Route::group(['as' => 'service.package.', 'prefix' => 'service/{service}/package'], function ()
    {
        Route::get('', 'PackageController@index')->name('index');
        Route::get('create', 'PackageController@create')->name('create');
        Route::post('', 'PackageController@store')->name('store');
        Route::get('{package}/edit', 'PackageController@edit')->name('edit');
        Route::put('{package}', 'PackageController@update')->name('update');
        Route::delete('{package}', 'PackageController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Page CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'page.', 'prefix' => 'page'], function ()
    {
        Route::get('', 'PageController@index')->name('index');
        Route::get('create', 'PageController@create')->name('create');
        Route::post('', 'PageController@store')->name('store');
        Route::get('{page}', 'PageController@show')->name('show');
        Route::get('{page}/edit', 'PageController@edit')->name('edit');
        Route::put('{page}', 'PageController@update')->name('update');
        Route::delete('{page}', 'PageController@destroy')->name('destroy');
    });
});
