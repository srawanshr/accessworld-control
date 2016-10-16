<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEndpointSecurityOrder extends FormRequest {

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
            'user_count' => 'required',
            'term'       => 'required',
            'price'      => 'required',
            'discount'   => 'required'
        ];
    }

    /**
     * @param $order
     * @return mixed
     */
    public function updateOrder($order)
    {
        $data = [
            'user_count'     => $this->input('user_count'),
            'term'           => $this->input('term', null),
            'price'          => $this->input('price', null),
            'discount'       => $this->input('discount', 0)
        ];

        if($this->has('provision'))
            $data['is_provisioned'] = $this->has('provision');

        return $order->update($data);
    }
}
