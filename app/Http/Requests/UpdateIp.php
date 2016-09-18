<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIp extends FormRequest {

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
            'ip'        => 'required',
            'subnet_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'ip'        => $this->input('ip'),
            'subnet_id' => $this->input('subnet_id'),
            'mac'       => $this->input('mac') ?: null,
            'hostname'  => $this->input('hostname') ?: null,
            'is_used'   => $this->has('is_used')
        ];

        return $data;
    }
}
