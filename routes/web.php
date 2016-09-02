<?php

// /*
// |--------------------------------------------------------------------------
// | Logging In/Out Routes
// |--------------------------------------------------------------------------
// */
// Route::get('login', 'Auth\AuthController@showLoginForm');
// Route::post('login', 'Auth\AuthController@login');
// Route::get('logout', 'Auth\AuthController@logout');

// Route::get('admin/login', 'AdminAuth\AuthController@showLoginForm');
// Route::post('admin/login', 'AdminAuth\AuthController@login');
// Route::get('admin/logout', 'AdminAuth\AuthController@logout');

// Route::get('register', 'Auth\AuthController@showLoginForm');
// Route::post('register', 'Auth\AuthController@store');

// /*
// |--------------------------------------------------------------------------
// | Password reset link request routes
// |--------------------------------------------------------------------------
// */
// Route::post('password/email', 'Auth\PasswordController@postEmail');

// /*
// |--------------------------------------------------------------------------
// | Password reset routes
// |--------------------------------------------------------------------------
// */
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');

Auth::routes();
