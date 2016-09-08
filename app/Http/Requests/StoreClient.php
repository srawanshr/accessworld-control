<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'name'    => 'required|unique:clients,name',
            'website' => 'required',
            'image'   => 'image|max:2048'
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
            'website' => $this->get('website')
        ];

        if ($this->has('is_published'))
            $inputs['is_published'] = true;

        return $inputs;
    }
}
