<?php

namespace App\Http\Requests\Dashboard\Loata;

use Illuminate\Foundation\Http\FormRequest;

class WeightCostRequest extends FormRequest
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
            'cost' => 'required|numeric|min:1',
            'from' => 'required|numeric|min:1|lt:to',
            'to' => 'required|numeric|min:1',
        ];
    }


}
