<?php

namespace App\Http\ViewCreators;

use Analytics;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Staff;
use App\Models\Customer;
use Illuminate\View\View;
use Spatie\Analytics\Period;

class HomeCreator {

    /**
     * The user model.
     *
     * @var \App\Models\User;
     */
    protected $user;

    /**
     * Create a new menu bar composer.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function create(View $view)
    {
        $count = [];

        $count['customers'] = [
            'active' => Customer::status(true)->count(),
            'total'  => Customer::count()
        ];

        $count['users'] = [
            'active' => User::status(true)->count(),
            'total'  => User::count()
        ];

        $count['staff'] = [
            'active' => Staff::active()->count(),
            'total'  => Staff::count()
        ];

        $count['orders'] = [
            'recent' => Order::whereBetween('created_at', [Carbon::now()->subDays(6)->toDateTimeString(), Carbon::now()->toDateTimeString()])->count(),
        ];

        $view->with('count', $count);
    }
}