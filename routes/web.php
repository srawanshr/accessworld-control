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

    /*
    |--------------------------------------------------------------------------
    | Staff CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'staff.', 'prefix' => 'staff'], function ()
    {
        Route::get('', 'StaffController@index')->name('index');
        Route::get('create', 'StaffController@create')->name('create');
        Route::post('', 'StaffController@store')->name('store');
        Route::get('{staff}/edit', 'StaffController@edit')->name('edit');
        Route::put('{staff}', 'StaffController@update')->name('update');
        Route::delete('{staff}', 'StaffController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Customer CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'customer.', 'prefix' => 'customer'], function ()
    {
        Route::get('', 'CustomerController@index')->name('index');
        Route::get('create', 'CustomerController@create')->name('create');
        Route::post('', 'CustomerController@store')->name('store');
        Route::get('{customer}', 'CustomerController@show')->name('show');
        Route::get('{customer}/edit', 'CustomerController@edit')->name('edit');
        Route::put('{customer}', 'CustomerController@update')->name('update');
        Route::delete('{customer}', 'CustomerController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Testimonial CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'testimonial.', 'prefix' => 'testimonial'], function ()
    {
        Route::get('', 'TestimonialController@index')->name('index');
        Route::get('create', 'TestimonialController@create')->name('create');
        Route::post('', 'TestimonialController@store')->name('store');
        Route::get('{testimonial}/edit', 'TestimonialController@edit')->name('edit');
        Route::put('{testimonial}', 'TestimonialController@update')->name('update');
        Route::delete('{testimonial}', 'TestimonialController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Certificates CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'certificate.', 'prefix' => 'certificate'], function ()
    {
        Route::get('', 'CertificateController@index')->name('index');
        Route::get('create', 'CertificateController@create')->name('create');
        Route::post('', 'CertificateController@store')->name('store');
        Route::get('{certificate}/edit', 'CertificateController@edit')->name('edit');
        Route::put('{certificate}', 'CertificateController@update')->name('update');
        Route::delete('{certificate}', 'CertificateController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Client CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'client.', 'prefix' => 'client'], function ()
    {
        Route::get('', 'ClientController@index')->name('index');
        Route::get('create', 'ClientController@create')->name('create');
        Route::post('', 'ClientController@store')->name('store');
        Route::get('{client}/edit', 'ClientController@edit')->name('edit');
        Route::put('{client}', 'ClientController@update')->name('update');
        Route::delete('{client}', 'ClientController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Operating System CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'operatingSystem.', 'prefix' => 'operating-system'], function ()
    {
        Route::get('', 'OperatingSystemController@index')->name('index');
        Route::get('create', 'OperatingSystemController@create')->name('create');
        Route::post('', 'OperatingSystemController@store')->name('store');
        Route::get('{operatingSystem}/edit', 'OperatingSystemController@edit')->name('edit');
        Route::put('{operatingSystem}', 'OperatingSystemController@update')->name('update');
        Route::delete('{operatingSystem}', 'OperatingSystemController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | DataCenter CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'dataCenter.', 'prefix' => 'data-center'], function ()
    {
        Route::get('', 'DataCenterController@index')->name('index');
        Route::get('create', 'DataCenterController@create')->name('create');
        Route::post('', 'DataCenterController@store')->name('store');
        Route::get('{dataCenter}/edit', 'DataCenterController@edit')->name('edit');
        Route::put('{dataCenter}', 'DataCenterController@update')->name('update');
        Route::delete('{dataCenter}', 'DataCenterController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | VPS Package CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'vpsPackage.', 'prefix' => 'vps-package'], function ()
    {
        Route::get('', 'VpsPackageController@index')->name('index');
        Route::get('create', 'VpsPackageController@create')->name('create');
        Route::post('', 'VpsPackageController@store')->name('store');
        Route::get('{vpsPackage}/edit', 'VpsPackageController@edit')->name('edit');
        Route::put('{vpsPackage}', 'VpsPackageController@update')->name('update');
        Route::delete('{vpsPackage}', 'VpsPackageController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | WEB Package CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'webPackage.', 'prefix' => 'web-package'], function ()
    {
        Route::get('', 'WebPackageController@index')->name('index');
        Route::get('create', 'WebPackageController@create')->name('create');
        Route::post('', 'WebPackageController@store')->name('store');
        Route::get('{webPackage}/edit', 'WebPackageController@edit')->name('edit');
        Route::put('{webPackage}', 'WebPackageController@update')->name('update');
        Route::delete('{webPackage}', 'WebPackageController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Package CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'emailPackage.', 'prefix' => 'email-package'], function ()
    {
        Route::get('', 'EmailPackageController@index')->name('index');
        Route::get('create', 'EmailPackageController@create')->name('create');
        Route::post('', 'EmailPackageController@store')->name('store');
        Route::get('{emailPackage}/edit', 'EmailPackageController@edit')->name('edit');
        Route::put('{emailPackage}', 'EmailPackageController@update')->name('update');
        Route::delete('{emailPackage}', 'EmailPackageController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Menu CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'menu.', 'prefix' => 'menu'], function ()
    {
        Route::get('', 'MenuController@index')->name('index');
        Route::post('', 'MenuController@store')->name('store');
        Route::put('', 'MenuController@update')->name('update');
        Route::delete('{menu}', 'MenuController@destroy')->name('destroy');

        Route::group(['as' => 'subMenu.'], function ()
        {
            Route::post('{menu}/subMenu', 'MenuController@storeSubMenu')->name('store');
            Route::delete('{menu}/subMenu/{subMenu}', 'MenuController@destroySubMenu')->name('destroy');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.', 'prefix' => 'order'], function ()
    {
        Route::get('', 'OrderController@index')->name('index');
        Route::get('create', 'OrderController@create')->name('create');
        Route::get('{order}/edit', 'OrderController@edit')->name('edit');
        Route::post('', 'OrderController@store')->name('store');
        Route::put('{order}', 'OrderController@update')->name('update');
        Route::delete('{order}', 'OrderController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | VPS Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.vps.', 'prefix' => 'order/vps'], function ()
    {
        Route::get('', 'VpsOrderController@index')->name('index');
        Route::put('{vps_order}', 'VpsOrderController@update')->name('update');
        Route::delete('{vps_order}', 'VpsOrderController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Web Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.web.', 'prefix' => 'order/web'], function ()
    {
        Route::get('', 'WebOrderController@index')->name('index');
        Route::put('{web_order}', 'WebOrderController@update')->name('update');
        Route::delete('{web_order}', 'WebOrderController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Order CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'order.email.', 'prefix' => 'order/email'], function ()
    {
        Route::get('', 'EmailOrderController@index')->name('index');
        Route::put('{email_order}', 'EmailOrderController@update')->name('update');
        Route::delete('{email_order}', 'EmailOrderController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | VPS Provision CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'provision.vps.', 'prefix' => 'vps/provision'], function ()
    {
        Route::get('', 'VpsProvisionController@index')->name('index');
        Route::get('{vps_order}/create', 'VpsProvisionController@create')->name('create');
        Route::post('{vps_order}', 'VpsProvisionController@store')->name('store');
        Route::get('{vps_provision}/edit', 'VpsProvisionController@edit')->name('edit');
        Route::get('{vps_provision}/renew', 'VpsProvisionController@renew')->name('renew');
        Route::post('{vps_provision}/renew', 'VpsProvisionController@extend')->name('extend');
        Route::put('{vps_provision}', 'VpsProvisionController@update')->name('update');
        Route::delete('{vps_provision}', 'VpsProvisionController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Web Provision CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'provision.web.', 'prefix' => 'web/provision'], function ()
    {
        Route::get('', 'WebProvisionController@index')->name('index');
        Route::get('{web_order}/create', 'WebProvisionController@create')->name('create');
        Route::post('{web_order}', 'WebProvisionController@store')->name('store');
        Route::get('{web_provision}/edit', 'WebProvisionController@edit')->name('edit');
        Route::put('{web_provision}', 'WebProvisionController@update')->name('update');
        Route::delete('{web_provision}', 'WebProvisionController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Provision CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'provision.email.', 'prefix' => 'email/provision'], function () {
        Route::get('', 'EmailProvisionController@index')->name('index');
        Route::get('{email_order}/create', 'EmailProvisionController@create')->name('create');
        Route::post('{email_order}', 'EmailProvisionController@store')->name('store');
        Route::get('{email_provision}/edit', 'EmailProvisionController@edit')->name('edit');
        Route::put('{email_provision}', 'EmailProvisionController@update')->name('update');
        Route::delete('{email_provision}', 'EmailProvisionController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Vps Component CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.vps.', 'prefix' => 'component/vps'], function ()
    {
        Route::get('', 'VpsComponentController@index')->name('index');
        Route::post('store', 'VpsComponentController@store')->name('store');
    });

    /*
    |--------------------------------------------------------------------------
    | Web Component CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.web.', 'prefix' => 'component/web'], function ()
    {
        Route::get('', 'WebComponentController@index')->name('index');
        Route::post('store', 'WebComponentController@store')->name('store');
    });

    /*
    |--------------------------------------------------------------------------
    | Email Component CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.email.', 'prefix' => 'component/email'], function ()
    {
        Route::get('', 'EmailComponentController@index')->name('index');
        Route::post('store', 'EmailComponentController@store')->name('store');
    });

    /*
    |--------------------------------------------------------------------------
    | IP CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'ip.', 'prefix' => 'ip'], function ()
    {
        Route::get('', 'IpController@index')->name('index');
        Route::get('edit', 'IpController@edit')->name('edit');
        Route::put('{ip}', 'IpController@update')->name('update');
        Route::delete('{ip}', 'IpController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | DHCP CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'dhcp.map.', 'prefix' => 'dhcp/map', 'namespace' => 'Dhcp'], function ()
    {
        Route::get('', 'MapController@index')->name('index');
        Route::get('edit', 'MapController@edit')->name('edit');
        Route::post('', 'MapController@store')->name('store');
        Route::put('{map}', 'MapController@update')->name('update');
        Route::delete('{map}', 'MapController@destroy')->name('destroy');
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
