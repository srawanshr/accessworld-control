<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest {

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
            'username' => 'required|min:3|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role'     => 'required|exists:roles,id',
            'avatar'   => 'image|between:1,2048'
        ];
    }

    /**
     * @return array
     */
    public function userFillData()
    {
        $inputs = [
            'email'           => trim($this->get('email')),
            'username'        => str_slug($this->get('username')),
            'password'        => bcrypt($this->get('password')),
            'first_name'      => $this->has('first_name') ? trim($this->get('first_name')) : null,
            'last_name'       => $this->has('last_name') ? trim($this->get('last_name')) : null,
            'address'         => $this->has('address') ? trim($this->get('address')) : null,
            'phone'           => $this->has('phone') ? trim($this->get('phone')) : null,
            'activation_code' => str_random(60)
        ];

        return $inputs;
    }
}
