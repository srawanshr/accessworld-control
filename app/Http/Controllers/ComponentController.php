<?php

namespace App\Http\Controllers;

use App\Models\DataCenter;
use App\Models\Menu;
use App\Models\OperatingSystem;
use App\Models\Page;
use App\Models\Service;
use DB;
use Illuminate\Http\Request;

class ComponentController extends Controller {

    /**
     * @param Menu $menu
     * @return \Illuminate\View\View
     */
    public function subMenuModal(Menu $menu)
    {
        $pages = Page::published()->primary(false)->pluck('title', 'id');

        return view('menu.partials.subMenuModal', compact('menu', 'pages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function orderForm(Request $request)
    {
        $service = Service::select(['slug','name'])->whereId($request->get('service_id'))->first();

        $key = $request->get('key');

        $data_centers = DataCenter::pluck('name', 'id');

        $operating_systems = OperatingSystem::active()->pluck('name', 'id');

        return view('order.partials.form', compact('service', 'key', 'data_centers', 'operating_systems'))->render();
    }
}
