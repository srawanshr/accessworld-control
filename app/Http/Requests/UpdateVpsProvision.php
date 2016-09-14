<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVpsProvision extends FormRequest {

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
            'name'            => 'required',
            'server_id'       => 'required',
            'virtual_machine' => 'required',
            'uuid'            => 'required',
            'ip'              => 'required',
            'mac'             => 'required',
            'cpu'             => 'required',
            'ram'             => 'required',
            'disk'            => 'required',
            'traffic'         => 'required',
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'                => $this->input('name'),
            'operating_system_id' => $this->input('operating_system_id'),
            'data_center_id'      => $this->input('data_center_id'),
            'server_id'           => $this->input('server_id'),
            'virtual_machine'     => $this->input('virtual_machine'),
            'uuid'                => $this->input('uuid'),
            'cpu'                 => $this->input('cpu'),
            'ram'                 => $this->input('ram'),
            'disk'                => $this->input('disk'),
            'traffic'             => $this->input('traffic'),
            'ip'                  => $this->input('ip'),
            'mac'                 => $this->input('mac'),
            'is_trial'            => $this->has('is_trial'),
            'is_managed'          => $this->is_managed,
            'expiry_date'         => $this->input('expiry_date'),
            'created_at'          => $this->input('created_at')
        ];

        return $data;
    }
}
