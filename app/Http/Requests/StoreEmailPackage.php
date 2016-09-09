<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailPackage extends FormRequest
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
            'name'        => 'required|unique:email_packages,name',
            'description' => 'required',
            'disk'        => 'required|min:1',
            'traffic'     => 'required|min:1',
            'domain'      => 'required|min:1',
            'price'       => 'required|min:0'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'slug'        => str_slug(trim($this->get('name'))),
            'name'        => trim($this->get('name')),
            'description' => $this->get('description'),
            'disk'        => $this->get('disk'),
            'traffic'     => $this->get('traffic'),
            'domain'      => $this->get('domain'),
            'price'       => $this->get('price')
        ];

        if ($this->has('is_published'))
            $inputs['is_published'] = true;

        return $inputs;
    }
}
