<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeEmailProvision extends FormRequest
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
            'name'         => 'required|min:3',
            'domain'       => 'required|numeric|min:1',
            'disk'         => 'required|numeric|min:1',
            'traffic'      => 'required|numeric|min: 1',
            'created_at'   => 'required|date',
            'username'     => 'required',
            'password'     => 'required_if:new_user,1|min:8',
            'new_user'     => 'required|boolean',
            'term'         => 'required|min:1'
        ];
    }

    public function data()
    {
        return [
            'name'         => $this->input('name'),
            'domain'       => $this->input('domain'),
            'disk'         => $this->input('disk') * 1000,
            'traffic'      => $this->input('traffic') * 1000,
            'created_at'   => $this->input('created_at'),
            'term'         => $this->input('term'),
            'username'     => $this->input('username'),
            'password'     => $this->input('password', ''),
            'customer'     => $this->route('email_order')->customer
        ];
    }
}
