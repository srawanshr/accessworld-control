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

Route::post('user/list', 'UserController@userList')->name('user.list')->middleware('auth:api');
Route::post('staff/list', 'StaffController@staffList')->name('staff.list')->middleware('auth:api');
Route::post('customer/list', 'CustomerController@customerList')->name('customer.list')->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| Order List Routes
|--------------------------------------------------------------------------
*/
Route::post('order/list', 'OrderController@orderList')->name('order.list')->middleware('auth:api');
Route::post('order/vps/list', 'VpsOrderController@vpsOrderList')->name('order.vps.list')->middleware('auth:api');
Route::post('order/web/list', 'WebOrderController@webOrderList')->name('order.web.list')->middleware('auth:api');
Route::post('order/email/list', 'EmailOrderController@emailOrderList')->name('order.email.list')->middleware('auth:api');
