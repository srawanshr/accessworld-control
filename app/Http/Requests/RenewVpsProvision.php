<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenewVpsProvision extends FormRequest
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
            'term'      => 'required|integer|min:1',
            'total'     => 'required|min:0|numeric',
            'discount'  => 'numeric',
            'sub_total' => 'numeric',
            'vat'       => 'numeric',
            'date'      => 'required|date'
        ];
    }
}
