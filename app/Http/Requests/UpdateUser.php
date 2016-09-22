<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest {

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
            'password_current' => 'required_with:password|old_password:users,' . $this->user->id,
            'password'         => 'required_with:password_current|min:8|confirmed',
            'role'             => 'exists:roles,id'
        ];
    }

    /**
     * @return array
     */
    public function userFillData()
    {
        if ($this->has('first_name'))
            $inputs['first_name'] = trim($this->get('first_name'));

        if ($this->has('last_name'))
            $inputs['last_name'] = trim($this->get('last_name'));

        if ($this->has('address'))
            $inputs['address'] = trim($this->get('address'));

        if ($this->has('phone'))
            $inputs['phone'] = trim($this->get('phone'));

        if ($this->has('password'))
            $inputs['password'] = bcrypt($this->get('password'));

        return $inputs;
    }
}
