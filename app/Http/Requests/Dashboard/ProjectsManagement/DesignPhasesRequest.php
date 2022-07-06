<?php

namespace App\Http\Requests\Dashboard\ProjectsManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DesignPhasesRequest extends FormRequest
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
        //for update
        if($this->_method == 'put' && isset($this->id)){
            return [
                'ar.name' => ['required', Rule::unique('design_phases_translations','name')->whereNot('phase_id',$this->id)],
                'en.name' => ['required', Rule::unique('design_phases_translations','name')->whereNot('phase_id',$this->id)],
                'image' => 'nullable|mimes:jpg,png,jpeg,gif,webp,svg'
            ];
        }

        //for store
        return [
            'ar.name' => ['required', Rule::unique('design_phases_translations','name')],
            'en.name' => ['required', Rule::unique('design_phases_translations','name')],
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp,svg'
        ];
    }
}
