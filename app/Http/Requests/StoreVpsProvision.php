<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreVpsProvision extends FormRequest {

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
            'mac'             => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $expiry_date = Carbon::createFromFormat('Y-m-d', $this->input('created_at'));

        if ($this->input('is_trial'))
            $expiry_date->addDays($this->input('term'));
        else
            $expiry_date->addMonths($this->input('term'));

        $data = [
            'vps_order_id'        => $this->vps_order->id,
            'customer_id'         => $this->vps_order->order->customer_id,
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
            'is_managed'          => is_null($this->is_managed) ? 0 : $this->is_managed,
            'expiry_date'         => $expiry_date->toDateTimeString(),
            'provisioned_by'      => auth()->id(),
            'created_at'          => $this->input('created_at')
        ];

        return $data;
    }
}
