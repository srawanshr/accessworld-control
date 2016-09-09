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
        Route::get('{customer}', 'CustomerController@show')->name('show');
        Route::get('create', 'CustomerController@create')->name('create');
        Route::post('', 'CustomerController@store')->name('store');
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
    | Client CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'operatingSystem.', 'prefix' => 'operatingSystem'], function ()
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
    Route::group(['as' => 'dataCenter.', 'prefix' => 'dataCenter'], function ()
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
        Route::post('', 'OrderController@store')->name('store');
        Route::get('{order}/edit', 'OrderController@edit')->name('edit');
        Route::put('{order}', 'OrderController@update')->name('update');
        Route::delete('{order}', 'OrderController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Component Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'component.', 'prefix' => 'component'], function ()
    {
        Route::get('{menu}/subMenuModal', 'ComponentController@subMenuModal')->name('subMenuModal');
        Route::get('order/form', 'ComponentController@orderForm')->name('order.form');
    });
});
