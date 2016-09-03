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
            'username' => 'required|min:3|unique:users,username,' . $this->user->id,
            'email'    => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'min:8|confirmed',
            'role'     => 'exists:roles,id'
        ];
    }

    /**
     * @return array
     */
    public function userFillData()
    {
        $inputs = [
            'first_name'      => $this->has('first_name') ? trim($this->get('first_name')) : null,
            'last_name'       => $this->has('last_name') ? trim($this->get('last_name')) : null,
            'address'         => $this->has('address') ? trim($this->get('address')) : null,
            'phone'           => $this->has('phone') ? trim($this->get('phone')) : null,
        ];

        if($this->has('password'))
        {
            $inputs['password'] = bcrypt($this->get('password'));
        }

        return $inputs;
    }
}
