<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebOrder extends FormRequest {

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
            'name'    => 'required',
            'term'    => 'required',
            'price'   => 'required',
            'domain'  => 'required',
            'disk'    => 'required',
            'traffic' => 'required'
        ];
    }

    /**
     * @param $order
     * @return
     */
    public function updateOrder($order)
    {
        $data = [
            'name'     => $this->input('name'),
            'term'     => $this->input('term') ?: null,
            'domain'   => $this->input('domain'),
            'disk'     => $this->input('disk'),
            'traffic'  => $this->input('traffic'),
            'price'    => $this->input('price') ?: null,
            'discount' => $this->input('discount') ?: 0
        ];

        return $order->update($data);
    }
}
