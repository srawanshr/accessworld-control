<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVpsOrder extends FormRequest {

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
            'name'                => 'required',
            'operating_system_id' => 'required',
            'data_center_id'      => 'required',
            'term'                => 'required_unless:is_trial,1',
            'price'               => 'required_unless:is_trial,1',
            'cpu'                 => 'required',
            'ram'                 => 'required',
            'disk'                => 'required',
            'traffic'             => 'required'
        ];
    }

    /**
     * Update VPS order
     */
    public function updateVpsOrder($vpsOrder)
    {
        $term = $this->input('term');
        $price = $this->input('price');
        $is_trial = $this->input('is_trial');

        $data = [
            'name'                => $this->input('name'),
            'operating_system_id' => $this->input('operating_system_id'),
            'data_center_id'      => $this->input('data_center_id'),
            'term'                => $term ? $is_trial ? null : $term : null,
            'cpu'                 => $this->input('cpu'),
            'ram'                 => $this->input('ram'),
            'disk'                => $this->input('disk'),
            'traffic'             => $this->input('traffic'),
            'price'               => $price ? $is_trial ? 0 : $price : 0,
            'discount'            => $this->input('discount') ?: 0,
            'is_trial'            => $this->input('is_trial') ?: 0,
            'is_managed'          => $this->input('is_managed') ?: 0,
            'additional_ip'       => $this->input('additional_ip') ?: 0,
        ];

        return $vpsOrder->update($data);
    }
}
