<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'username'   => 'required|min:3|unique:customers,username',
            'email'      => 'required|email|unique:customers,email',
            'password'   => 'required|min:8|confirmed',
            'avatar'     => 'image|between:1,2048',
            'first_name' => 'required',
            'last_name'  => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'email'           => trim($this->get('email')),
            'username'        => str_slug($this->get('username')),
            'password'        => bcrypt($this->get('password')),
            'is_admin'        => $this->has('is_admin') ? trim($this->get('is_admin')) : 0,
            'activation_code' => str_random(60)
        ];

        return $inputs;
    }

    /**
     * @return array
     */
    public function detailData()
    {
        $inputs = [
            'first_name' => $this->has('detail.first_name') ? trim($this->get('detail.first_name')) : null,
            'last_name'  => $this->has('detail.last_name') ? trim($this->get('detail.last_name')) : null,
            'address'   => $this->has('detail.address') ? trim($this->get('detail.address')) : null,
            'phone'     => $this->has('detail.phone') ? trim($this->get('detail.phone')) : null,
            'country'   => $this->has('detail.country') ? trim($this->get('detail.country')) : null,
            'company'   => $this->has('detail.company') ? trim($this->get('detail.company')) : null,
        ];

        return $inputs;
    }
}
