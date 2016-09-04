<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class UpdateService extends FormRequest {

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
            'name'  => 'required|unique:services,name,' . $this->service->id,
            'image' => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function serviceFillData()
    {
        $inputs = [
            'name'              => trim($this->get('name')),
            'short_description' => $this->get('short_description'),
            'description'       => $this->get('description'),
            'view'              => 'service.show'
        ];

        return $inputs;
    }
}
