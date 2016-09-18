<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailProvision extends FormRequest
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
            'name'              => 'required',
            'domain'            => 'required',
            'disk'              => 'required',
            'traffic'           => 'required',
            'connection_string' => 'required',
            'server_domain_id'  => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'              => $this->input('name'),
            'customer_id'       => $this->email_order->order->customer_id,
            'email_order_id'    => $this->email_order->id,
            'domain'            => $this->input('domain'),
            'disk'              => $this->input('disk'),
            'traffic'           => $this->input('traffic'),
            'connection_string' => $this->input('connection_string'),
            'server_domain_id'  => $this->input('server_domain_id'),
            'provisioned_by'    => auth()->id(),
            'created_at'        => $this->input('created_at')
        ];

        return $data;
    }
}
