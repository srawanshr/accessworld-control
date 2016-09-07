<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificate extends FormRequest
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
            'title'       => 'required|unique:certificates,title',
            'description' => 'required',
            'image'       => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'slug'        => str_slug(trim($this->get('title'))),
            'title'       => trim($this->get('title')),
            'description' => $this->get('description')
        ];

        if ($this->has('is_published'))
            $inputs['is_published'] = true;

        return $inputs;
    }
}
