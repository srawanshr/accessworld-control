<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperatingSystem extends FormRequest {

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
            'name'  => 'required|unique:operating_systems,name',
            'image' => 'required|image|max:2048',
            'price' => 'required|min:0'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'slug'  => str_slug(trim($this->get('name'))),
            'name'  => trim($this->get('name')),
            'price' => $this->get('price')
        ];

        if ($this->has('is_active'))
            $inputs['is_active'] = true;

        return $inputs;
    }
}
