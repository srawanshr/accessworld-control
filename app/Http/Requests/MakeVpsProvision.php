<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeVpsProvision extends FormRequest
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
        $validVm = implode(',', array_keys(vms()));
        $validIps = ips()->implode(',');

        return [
            'vm'               => 'required|in:' . $validVm,
            'name'             => 'required|min:3',
            'operating_system' => 'required',
            'data_center_id'   => 'required|exists:data_centers,id',
            'server_id'        => 'required|unique:vps_provisions,server_id',
            'ip_address'       => 'required|ip|in:'.$validIps,
            'cpu'              => 'required|numeric|min:1|max:16',
            'ram'              => 'required|numeric|min:1|max:16',
            'disk'             => 'required|numeric|min:8',
            'traffic'          => 'required|numeric|min: 100',
            'created_at'       => 'required|date',
            'term'             => 'required|min:1'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        return [
            'name'      => '' . $this->input('name'),
            'cpu'       => '' . $this->input('cpu'),
            'ram'       => '' . $this->input('ram') * 1024 * 1024 * 1024,
            'disk'      => '' . $this->input('disk') * 1024 * 1024 * 1024,
            'ip'        => '' . $this->input('ip_address'),
            'server_id' => '' . $this->input('server_id'),
            'uuid'      => '' . $this->input('operating_system')
        ];
    }
}
