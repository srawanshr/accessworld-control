<?php

namespace App\Http\Requests;

use App\Models\Ip;
use Illuminate\Foundation\Http\FormRequest;

class StoreDhcpMap extends FormRequest {

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
            'ip'       => 'required',
            'mac'      => 'required',
            'hostname' => 'required',
            'serial'   => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'ip'       => $this->input('ip'),
            'mac'      => $this->input('mac'),
            'hostname' => $this->input('hostname'),
            'subnet'   => Ip::whereIp($this->input('ip'))->first()->subnet->subnet,
            'serial'   => $this->input('serial')
        ];

        return $data;
    }
}
