<?php

namespace App\Http\Requests;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

class StoreMenu extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function subMenuFillData()
    {
        $page = Page::find($this->get('page'));

        $inputs = [
            'menu_id' => $this->menu->id,
            'name'    => $this->has('name') ? $this->has('name') : $page->title,
            'url'     => route('page.show', $page->slug),
            'order'   => $this->menu->subMenus->sortByDesc('order')->first() ? $this->menu->subMenus->sortByDesc('order')->first()->order + 1 : 0,
        ];

        return $inputs;
    }

    /**
     * @return array
     */
    public function menuFillData()
    {
        $page = Page::find($this->get('page'));

        $inputs = [
            'name'    => $this->has('name') ? $this->has('name') : $page->title,
            'url'     => route('page.show', $page->slug),
            'order'   => Menu::orderBy('order', 'desc')->first()->order + 1,
        ];

        return $inputs;
    }
}
