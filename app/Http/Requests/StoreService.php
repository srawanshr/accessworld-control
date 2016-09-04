<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest {

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
            'name'  => 'required|unique:services,name',
            'image' => 'required|image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function serviceFillData()
    {
        $inputs = [
            'slug'              => str_slug(trim($this->get('name'))),
            'name'              => trim($this->get('name')),
            'short_description' => $this->get('short_description'),
            'description'       => $this->get('description'),
            'order'             => Service::orderBy('order', 'desc')->first()->order + 1,
            'view'              => 'service.show'
        ];

        return $inputs;
    }
}
