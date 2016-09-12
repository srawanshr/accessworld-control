<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVpsPackage extends FormRequest
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
            "name"        => "required|unique:vps_packages,name,".$this->vpsPackage->id,
            'description' => 'required',
            "cpu"         => "required|min:1",
            "ram"         => "required|min:1",
            "traffic"     => "required|min:1",
            "disk"        => "required|min:1",
            'price'       => 'required|min:0'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'name'        => trim($this->get('name')),
            'description' => $this->get('description'),
            'cpu'         => $this->get('cpu'),
            'ram'         => $this->get('ram'),
            'traffic'     => $this->get('traffic'),
            'disk'        => $this->get('disk'),
            'price'       => $this->get('price')
        ];

        if ($this->has('is_published'))
        {
            $inputs['is_published'] = true;
        } else {
            $inputs['is_published'] = false;
        }

        return $inputs;
    }
}
