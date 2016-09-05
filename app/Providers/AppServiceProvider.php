<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'user'    => User::class,
            'service' => Service::class,
            'page'    => Page::class,
            'menu'    => Menu::class
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
