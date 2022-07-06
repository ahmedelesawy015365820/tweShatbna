<?php

namespace App\Http\Requests\Dashboard\ProjectsManagement;

use Illuminate\Foundation\Http\FormRequest;

class DesignersFinesRequest extends FormRequest
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
            'percentage' => 'required|numeric|between:0,100.00',
            'from' => 'required|numeric|min:1|lt:to',
            'to' => 'required|numeric',
            'type' => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => $this->header('lang') && strtolower($this->header('lang')) == 'ar' ? 'نوع العقوبة مطلوب' : 'Fine type is required'
        ];
    }
}
