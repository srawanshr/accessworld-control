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
Route::post('dhcp/map/list', 'Dhcp\MapController@mapList')->name('dhcp.map.list')->middleware('auth:api');
Route::post('ip/list', 'IpController@ipList')->name('ip.list')->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| Order List Routes
|--------------------------------------------------------------------------
*/
Route::post('order/list', 'OrderController@orderList')->name('order.list')->middleware('auth:api');
Route::post('order/vps/list', 'VpsOrderController@vpsOrderList')->name('order.vps.list')->middleware('auth:api');
Route::post('order/web/list', 'WebOrderController@webOrderList')->name('order.web.list')->middleware('auth:api');
Route::post('order/email/list', 'EmailOrderController@emailOrderList')->name('order.email.list')->middleware('auth:api');
Route::post('order/endpoint-security/list', 'EndpointSecurityOrderController@endpointSecurityOrderList')->name('order.endpointSecurity.list')->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| Provision List Routes
|--------------------------------------------------------------------------
*/
Route::post('provision/vps/list', 'VpsProvisionController@vpsProvisionList')->name('provision.vps.list')->middleware('auth:api');
Route::post('provision/web/list', 'WebProvisionController@webProvisionList')->name('provision.web.list')->middleware('auth:api');
Route::post('provision/email/list', 'EmailProvisionController@emailProvisionList')->name('provision.email.list')->middleware('auth:api');

Route::get('vm/os', 'VpsProvisionController@getOperatingSystems')->name('vm.os.list')->middleware('auth:api');
Route::get('vm/serverid', 'VpsProvisionController@getServerId')->name('vm.serverid')->middleware('auth:api');

Route::get('lakuri/checkuser', 'WebProvisionController@checkClient')->name('lakuri.checkuser')->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| Deposit List Routes
|--------------------------------------------------------------------------
*/
Route::post('customer/{customer}/deposit', 'DepositController@depositList')->name('customer.deposit.list')->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| Bandwidth Routes
|--------------------------------------------------------------------------
*/

Route::post('traffic/daily/list', 'TrafficController@dailyList')->name('traffic.daily.list')->middleware('auth:api');
Route::post('traffic/monthly/list', 'TrafficController@monthlyList')->name('traffic.monthly.list')->middleware('auth:api');