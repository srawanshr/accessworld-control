<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataCenter extends FormRequest
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
            'country' => 'required',
            'name'    => 'required',
            'prefix'  => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'slug'    => str_slug(trim($this->get('name'))),
            'name'    => trim($this->get('name')),
            'country' => $this->get('country'),
            'prefix'  => $this->get('prefix')
        ];

        return $inputs;
    }
}
