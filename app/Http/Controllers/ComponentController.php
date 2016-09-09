<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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

        return view('order.partials.form', compact('service', 'key'))->render();
    }
}
