<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user/list', 'UserController@userList')->name('user.list')->middleware('auth:api');
Route::get('/staff/list', 'StaffController@staffList')->name('staff.list')->middleware('auth:api');
Route::get('/customer/list', 'CustomerController@customerList')->name('customer.list')->middleware('auth:api');
