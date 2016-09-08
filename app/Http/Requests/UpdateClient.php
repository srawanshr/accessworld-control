<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClient extends FormRequest
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
            'name'    => 'required|unique:clients,name,' . $this->client->id,
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
            'name'    => trim($this->get('name')),
            'website' => $this->get('website')
        ];

        if ($this->has('is_published')) {
            $inputs['is_published'] = true;
        } else {
            $inputs['is_published'] = false;
        }

        return $inputs;
    }
}
