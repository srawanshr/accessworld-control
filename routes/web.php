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
 * Staff QR Code Image Route
 */
Route::get('qrcode/{id}', ['as' => 'qrcode.show', 'uses' => 'StaffController@qr']);

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

Route::group(['middleware' => 'auth'], function ()
{
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
        Route::get('', 'UserController@index')->name('index')->middleware('permission:read.user');
        Route::get('create', 'UserController@create')->name('create')->middleware('permission:save.user');
        Route::post('', 'UserController@store')->name('store')->middleware('permission:save.user');
        Route::get('{user}', 'UserController@show')->name('show')->middleware('permission:read.user');
        Route::get('{user}/edit', 'UserController@edit')->name('edit')->middleware('permission:save.user');
        Route::put('{user}', 'UserController@update')->name('update')->middleware('permission:save.user');
        Route::delete('{user}', 'UserController@destroy')->name('destroy')->middleware('permission:delete.user');
    });

    /*
    |--------------------------------------------------------------------------
    | Role CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'role.', 'prefix' => 'role'], function ()
    {
        Route::get('', 'RoleController@index')->name('index')->middleware('permission:read.role');
        Route::get('create', 'RoleController@create')->name('create')->middleware('permission:save.role');
        Route::post('', 'RoleController@store')->name('store')->middleware('permission:save.role');
        Route::get('{role}', 'RoleController@show')->name('show')->middleware('permission:read.role');
        Route::get('{role}/edit', 'RoleController@edit')->name('edit')->middleware('permission:save.role');
        Route::put('{role}', 'RoleController@update')->name('update')->middleware('permission:save.role');
        Route::delete('{role}', 'RoleController@destroy')->name('destroy')->middleware('permission:delete.role');
    });

    /*
    |--------------------------------------------------------------------------
    | Service CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'service.', 'prefix' => 'service'], function ()
    {
        Route::get('', 'ServiceController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'ServiceController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'ServiceController@store')->name('store')->middleware('permission:save.content');
        Route::get('{service}/edit', 'ServiceController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{service}', 'ServiceController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{service}', 'ServiceController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Page CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'page.', 'prefix' => 'page'], function ()
    {
        Route::get('', 'PageController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'PageController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'PageController@store')->name('store')->middleware('permission:save.content');
        Route::get('{page}', 'PageController@show')->name('show')->middleware('permission:read.content');
        Route::get('{page}/edit', 'PageController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{page}', 'PageController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{page}', 'PageController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Staff CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'staff.', 'prefix' => 'staff'], function ()
    {
        Route::get('', 'StaffController@index')->name('index')->middleware('permission:read.staff');
        Route::get('create', 'StaffController@create')->name('create')->middleware('permission:save.staff');
        Route::post('', 'StaffController@store')->name('store')->middleware('permission:save.staff');
        Route::get('{staff}/edit', 'StaffController@edit')->name('edit')->middleware('permission:save.staff');
        Route::put('{staff}', 'StaffController@update')->name('update')->middleware('permission:save.staff');
        Route::delete('{staff}', 'StaffController@destroy')->name('destroy')->middleware('permission:delete.staff');
    });

    /*
    |--------------------------------------------------------------------------
    | Customer CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'customer.', 'prefix' => 'customer'], function ()
    {
        Route::get('', 'CustomerController@index')->name('index')->middleware('permission:read.customer');
        Route::get('create', 'CustomerController@create')->name('create')->middleware('permission:save.customer');
        Route::post('', 'CustomerController@store')->name('store')->middleware('permission:save.customer');
        Route::get('{customer}', 'CustomerController@show')->name('show')->middleware('permission:read.customer');
        Route::get('{customer}/edit', 'CustomerController@edit')->name('edit')->middleware('permission:save.customer');
        Route::put('{customer}', 'CustomerController@update')->name('update')->middleware('permission:save.customer');
        Route::delete('{customer}', 'CustomerController@destroy')->name('destroy')->middleware('permission:save.customer');
    });

    /*
    |--------------------------------------------------------------------------
    | Testimonial CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'testimonial.', 'prefix' => 'testimonial'], function ()
    {
        Route::get('', 'TestimonialController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'TestimonialController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'TestimonialController@store')->name('store')->middleware('permission:save.content');
        Route::get('{testimonial}/edit', 'TestimonialController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{testimonial}', 'TestimonialController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{testimonial}', 'TestimonialController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Certificates CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'certificate.', 'prefix' => 'certificate'], function ()
    {
        Route::get('', 'CertificateController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'CertificateController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'CertificateController@store')->name('store')->middleware('permission:save.content');
        Route::get('{certificate}/edit', 'CertificateController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{certificate}', 'CertificateController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{certificate}', 'CertificateController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Client CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'client.', 'prefix' => 'client'], function ()
    {
        Route::get('', 'ClientController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'ClientController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'ClientController@store')->name('store')->middleware('permission:save.content');
        Route::get('{client}/edit', 'ClientController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{client}', 'ClientController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{client}', 'ClientController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Operating System CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'operatingSystem.', 'prefix' => 'operating-system'], function ()
    {
        Route::get('', 'OperatingSystemController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'OperatingSystemController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'OperatingSystemController@store')->name('store')->middleware('permission:save.content');
        Route::get('{operatingSystem}/edit', 'OperatingSystemController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{operatingSystem}', 'OperatingSystemController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{operatingSystem}', 'OperatingSystemController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | DataCenter CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'dataCenter.', 'prefix' => 'data-center'], function ()
    {
        Route::get('', 'DataCenterController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'DataCenterController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'DataCenterController@store')->name('store')->middleware('permission:save.content');
        Route::get('{dataCenter}/edit', 'DataCenterController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{dataCenter}', 'DataCenterController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{dataCenter}', 'DataCenterController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | VPS Package CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'vpsPackage.', 'prefix' => 'vps-package'], function ()
    {
        Route::get('', 'VpsPackageController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'VpsPackageController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'VpsPackageController@store')->name('store')->middleware('permission:save.content');
        Route::get('{vpsPackage}/edit', 'VpsPackageController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{vpsPackage}', 'VpsPackageController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{vpsPackage}', 'VpsPackageController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | WEB Package CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'webPackage.', 'prefix' => 'web-package'], function ()
    {
        Route::get('', 'WebPackageController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'WebPackageController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'WebPackageController@store')->name('store')->middleware('permission:save.content');
        Route::get('{webPackage}/edit', 'WebPackageController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{webPackage}', 'WebPackageController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{webPackage}', 'WebPackageController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Package CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'emailPackage.', 'prefix' => 'email-package'], function ()
    {
        Route::get('', 'EmailPackageController@index')->name('index')->middleware('permission:read.content');
        Route::get('create', 'EmailPackageController@create')->name('create')->middleware('permission:save.content');
        Route::post('', 'EmailPackageController@store')->name('store')->middleware('permission:save.content');
        Route::get('{emailPackage}/edit', 'EmailPackageController@edit')->name('edit')->middleware('permission:save.content');
        Route::put('{emailPackage}', 'EmailPackageController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{emailPackage}', 'EmailPackageController@destroy')->name('destroy')->middleware('permission:delete.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Menu CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'menu.', 'prefix' => 'menu'], function ()
    {
        Route::get('', 'MenuController@index')->name('index')->middleware('permission:read.content');
        Route::post('', 'MenuController@store')->name('store')->middleware('permission:save.content');
        Route::put('', 'MenuController@update')->name('update')->middleware('permission:save.content');
        Route::delete('{menu}', 'MenuController@destroy')->name('destroy')->middleware('permission:delete.content');

        Route::group(['as' => 'subMenu.'], function ()
        {
            Route::post('{menu}/subMenu', 'MenuController@storeSubMenu')->name('store')->middleware('permission:save.content');
            Route::delete('{menu}/subMenu/{subMenu}', 'MenuController@destroySubMenu')->name('destroy')->middleware('permission:delete.content');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.', 'prefix' => 'order'], function ()
    {
        Route::get('', 'OrderController@index')->name('index')->middleware('permission:read.order');
        Route::get('create', 'OrderController@create')->name('create')->middleware('permission:save.order');
        Route::get('{order}/edit', 'OrderController@edit')->name('edit')->middleware('permission:save.order');
        Route::post('', 'OrderController@store')->name('store')->middleware('permission:save.order');
        Route::put('{order}', 'OrderController@update')->name('update')->middleware('permission:save.order');
        Route::delete('{order}', 'OrderController@destroy')->name('destroy')->middleware('permission:delete.order');
    });

    /*
    |--------------------------------------------------------------------------
    | VPS Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.vps.', 'prefix' => 'order/vps'], function ()
    {
        Route::get('', 'VpsOrderController@index')->name('index')->middleware('permission:read.order');
        Route::put('{vps_order}', 'VpsOrderController@update')->name('update')->middleware('permission:save.order');
        Route::delete('{vps_order}', 'VpsOrderController@destroy')->name('destroy')->middleware('permission:delete.order');
    });

    /*
    |--------------------------------------------------------------------------
    | Web Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.web.', 'prefix' => 'order/web'], function ()
    {
        Route::get('', 'WebOrderController@index')->name('index')->middleware('permission:read.order');
        Route::put('{web_order}', 'WebOrderController@update')->name('update')->middleware('permission:save.order');
        Route::delete('{web_order}', 'WebOrderController@destroy')->name('destroy')->middleware('permission:delete.order');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.email.', 'prefix' => 'order/email'], function ()
    {
        Route::get('', 'EmailOrderController@index')->name('index')->middleware('permission:read.order');
        Route::put('{email_order}', 'EmailOrderController@update')->name('update')->middleware('permission:save.order');
        Route::delete('{email_order}', 'EmailOrderController@destroy')->name('destroy')->middleware('permission:delete.order');
    });

    /*
    |--------------------------------------------------------------------------
    | VPS Provision CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'provision.vps.', 'prefix' => 'vps/provision'], function ()
    {
        Route::get('', 'VpsProvisionController@index')->name('index')->middleware('permission:read.provision');
        Route::get('{vps_order}/create', 'VpsProvisionController@create')->name('create')->middleware('permission:save.provision');
        Route::get('{vps_order}/make', 'VpsProvisionController@make')->name('make')->middleware('permission:save.provision');
        Route::post('{vps_order}/make', 'VpsProvisionController@provision')->name('provision')->middleware('permission:save.provision');
        Route::post('{vps_order}', 'VpsProvisionController@store')->name('store')->middleware('permission:save.provision');
        Route::get('{vps_provision}/edit', 'VpsProvisionController@edit')->name('edit')->middleware('permission:save.provision');
        Route::get('{vps_provision}/renew', 'VpsProvisionController@renew')->name('renew')->middleware('permission:save.provision');
        Route::post('{vps_provision}/renew', 'VpsProvisionController@extend')->name('extend')->middleware('permission:save.provision');
        Route::put('{vps_provision}', 'VpsProvisionController@update')->name('update')->middleware('permission:save.provision');
        Route::delete('{vps_provision}', 'VpsProvisionController@destroy')->name('destroy')->middleware('permission:delete.provision');
    });

    /*
    |--------------------------------------------------------------------------
    | Web Provision CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'provision.web.', 'prefix' => 'web/provision'], function ()
    {
        Route::get('', 'WebProvisionController@index')->name('index')->middleware('permission:read.provision');
        Route::get('{web_order}/create', 'WebProvisionController@create')->name('create')->middleware('permission:save.provision');
        Route::post('{web_order}', 'WebProvisionController@store')->name('store')->middleware('permission:save.provision');
        Route::get('{web_provision}/edit', 'WebProvisionController@edit')->name('edit')->middleware('permission:save.provision');
        Route::put('{web_provision}', 'WebProvisionController@update')->name('update')->middleware('permission:save.provision');
        Route::delete('{web_provision}', 'WebProvisionController@destroy')->name('destroy')->middleware('permission:delete.provision');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Provision CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'provision.email.', 'prefix' => 'email/provision'], function () {
        Route::get('', 'EmailProvisionController@index')->name('index')->middleware('permission:read.provision');
        Route::get('{email_order}/create', 'EmailProvisionController@create')->name('create')->middleware('permission:save.provision');
        Route::post('{email_order}', 'EmailProvisionController@store')->name('store')->middleware('permission:save.provision');
        Route::get('{email_provision}/edit', 'EmailProvisionController@edit')->name('edit')->middleware('permission:save.provision');
        Route::put('{email_provision}', 'EmailProvisionController@update')->name('update')->middleware('permission:save.provision');
        Route::delete('{email_provision}', 'EmailProvisionController@destroy')->name('destroy')->middleware('permission:delete.provision');
    });

    /*
    |--------------------------------------------------------------------------
    | Vps Component CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.vps.', 'prefix' => 'component/vps'], function ()
    {
        Route::get('', 'VpsComponentController@index')->name('index')->middleware('permission:read.content');
        Route::post('store', 'VpsComponentController@store')->name('store')->middleware('permission:save.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Web Component CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.web.', 'prefix' => 'component/web'], function ()
    {
        Route::get('', 'WebComponentController@index')->name('index')->middleware('permission:read.content');
        Route::post('store', 'WebComponentController@store')->name('store')->middleware('permission:save.content');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Component CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.email.', 'prefix' => 'component/email'], function ()
    {
        Route::get('', 'EmailComponentController@index')->name('index')->middleware('permission:read.content');
        Route::post('store', 'EmailComponentController@store')->name('store')->middleware('permission:save.content');
    });

    /*
    |--------------------------------------------------------------------------
    | IP CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'ip.', 'prefix' => 'ip'], function ()
    {
        Route::get('', 'IpController@index')->name('index')->middleware('permission:read.ip');
        Route::get('edit', 'IpController@edit')->name('edit')->middleware('permission:save.ip');
        Route::put('{ip}', 'IpController@update')->name('update')->middleware('permission:save.ip');
        Route::delete('{ip}', 'IpController@destroy')->name('destroy')->middleware('permission:delete.ip');
    });

    /*
    |--------------------------------------------------------------------------
    | DHCP CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'dhcp.map.', 'prefix' => 'dhcp/map', 'namespace' => 'Dhcp'], function ()
    {
        Route::get('', 'MapController@index')->name('index')->middleware('permission:read.ip');
        Route::get('edit', 'MapController@edit')->name('edit')->middleware('permission:save.ip');
        Route::post('', 'MapController@store')->name('store')->middleware('permission:save.ip');
        Route::put('{map}', 'MapController@update')->name('update')->middleware('permission:save.ip');
        Route::delete('{map}', 'MapController@destroy')->name('destroy')->middleware('permission:delete.ip');
    });

    /*
    |--------------------------------------------------------------------------
    | Component Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.', 'prefix' => 'component'], function ()
    {
        Route::get('{menu}/subMenuModal', 'ComponentController@subMenuModal')->name('subMenuModal');
        Route::get('customer/details', 'CustomerController@details')->name('customer.details');
        Route::get('order/form', 'ComponentController@orderForm')->name('order.form');

        Route::post('order/details', 'OrderController@details')->name('order.details');
        Route::post('order/vps/details', 'VpsOrderController@details')->name('order.vps.details');
        Route::post('order/web/details', 'WebOrderController@details')->name('order.web.details');
        Route::post('order/email/details', 'EmailOrderController@details')->name('order.email.details');

        Route::post('provision/vps/details', 'VpsProvisionController@details')->name('provision.vps.details');
        Route::post('provision/web/details', 'WebProvisionController@details')->name('provision.web.details');
        Route::post('provision/email/details', 'EmailProvisionController@details')->name('provision.email.details');
    });
});
