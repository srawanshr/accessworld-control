<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'   => 'required|min:3|unique:customers,username,' . $this->customer->id,
            'email'      => 'required|email|unique:customers,email,' . $this->customer->id,
            'password'   => 'min:8|confirmed',
            'image'      => 'image|between:1,2048',
            'first_name' => 'required',
            'last_name'  => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'email'           => trim($this->get('email')),
            'username'        => str_slug($this->get('username')),
            'password'        => bcrypt($this->get('password')),
            'first_name'      => $this->has('first_name') ? trim($this->get('first_name')) : null,
            'last_name'       => $this->has('last_name') ? trim($this->get('last_name')) : null,
            'address'         => $this->has('address') ? trim($this->get('address')) : null,
            'phone'           => $this->has('phone') ? trim($this->get('phone')) : null,
            'country'         => $this->has('country') ? trim($this->get('country')) : null,
            'company'         => $this->has('company') ? trim($this->get('company')) : null
        ];

        if ( ! empty($this->input('password')))
            $data['password'] = bcrypt($this->input('password'));

        return $data;
    }
}
