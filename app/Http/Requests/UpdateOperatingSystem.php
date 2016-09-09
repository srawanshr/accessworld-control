<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOperatingSystem extends FormRequest
{
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
            'name'  => 'required|unique:operating_systems,name,'.$this->operatingSystem->id,
            'image' => 'image|max:2048',
            'price' => 'required|min:0'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'name'  => trim($this->get('name')),
            'price' => $this->get('price')
        ];

        if ($this->has('is_active'))
        {
            $inputs['is_active'] = true;
        } else {
            $inputs['is_active'] = false;
        }

        return $inputs;
    }
}
