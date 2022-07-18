<?php

namespace App\Http\Requests\Dashboard\Loata;

use Illuminate\Foundation\Http\FormRequest;

class AreaCostRequest extends FormRequest
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
        if($this->isMethod('put')){
            return [
                'cost' => 'required|numeric|min:1',
                'area_id' => 'required|exists:areas,id|unique:area_costs,area_id,'.$this->area_id,
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
            ];
        }
        return [
            'cost' => 'required|numeric|min:1',
            'area_id' => 'required|exists:areas,id|unique:area_costs,area_id',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
        ];
    }


}
