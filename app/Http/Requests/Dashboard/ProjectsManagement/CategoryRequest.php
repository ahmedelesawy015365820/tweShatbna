<?php

namespace App\Http\Requests\Dashboard\ProjectsManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        if($this->isMethod('put') && isset($this->id)){
            return [
                'ar.name' => ['required', Rule::unique('category_translations','name')->whereNot('category_id',$this->id)],
                'en.name' => ['required', Rule::unique('category_translations','name')->whereNot('category_id',$this->id)],
            ];
        }

        //for store
        return [
            'ar.name' => ['required', Rule::unique('category_translations','name')],
            'en.name' => ['required', Rule::unique('category_translations','name')],
        ];
    }
}
