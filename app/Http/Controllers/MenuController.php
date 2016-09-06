<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu;
use DB;
use App\Models\Menu;
use App\Models\Page;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MenuController extends Controller {

    protected $menu;

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $menus = Menu::with('subMenus')->orderBy('order')->get();

        $pages = Page::published()->primary(false)->pluck('title', 'id');

        return view('menu.index', compact('menus', 'pages'));
    }

    /**
     * @param StoreMenu $request
     * @return mixed
     */
    public function store(StoreMenu $request)
    {
        $menu = Menu::create($request->menuFillData());

        return back()->withSuccess(trans('messages.create_success', ['entity' => 'Menu']))->with('collapse_in', $menu->id);
    }

    /**
     * @param StoreMenu $request
     * @param Menu $menu
     * @return mixed
     */
    public function storeSubMenu(StoreMenu $request, Menu $menu)
    {
        SubMenu::create($request->subMenuFillData());

        return back()->withSuccess(trans('messages.create_success', ['entity' => 'Sub Menu']))->with('collapse_in', $menu->id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        foreach ($request->get('order') as $order => $menuId)
        {
            $menu = Menu::find($menuId);

            $menu->update(['order' => $order]);
        }

        foreach ($request->get('sub_menu_order') as $menuId => $subMenuOrder)
        {
            foreach ($subMenuOrder as $order => $subMenuId)
            {
                $subMenu = SubMenu::find($subMenuId);

                $subMenu->update(['order' => $order]);
            }
        }

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Menu Order']));
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete())
        {
            return response()->json([
                'Result' => 'OK',
                'Menu'   => true
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroySubMenu(Menu $menu, SubMenu $subMenu)
    {
        if ($subMenu->delete())
        {
            return response()->json([
                'Result' => 'OK',
                'Menu'   => false
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }
}
