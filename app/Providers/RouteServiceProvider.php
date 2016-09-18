<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::model('user', 'App\Models\User');
        Route::model('customer', 'App\Models\Customer');
        Route::model('service', 'App\Models\Service');
        Route::model('page', 'App\Models\Page');
        Route::model('package', 'App\Models\Package');
        Route::model('client', 'App\Models\Client');
        Route::model('certificate', 'App\Models\Certificate');
        Route::model('vps_order', 'App\Models\VpsOrder');
        Route::model('vps_provision', 'App\Models\VpsProvision');
        Route::model('web_order', 'App\Models\WebOrder');
        Route::model('web_provision', 'App\Models\WebProvision');
        Route::model('email_order', 'App\Models\EmailOrder');
        Route::model('email_provision', 'App\Models\EmailProvision');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
        ], function ($router)
        {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ], function ($router)
        {
            require base_path('routes/api.php');
        });
    }
}
