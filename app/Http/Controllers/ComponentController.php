<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;

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
}
