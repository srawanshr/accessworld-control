<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'user'        => User::class,
            'service'     => Service::class,
            'page'        => Page::class,
            'menu'        => Menu::class,
            'client'      => Client::class,
            'certificate' => Certificate::class,
            'staff'       => Staff::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
