<?php

namespace App\Http\Requests\Dashboard\Loata;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
                'ar.name' => ['required', Rule::unique('product_translations','name')->whereNot('product_id',$this->id)],
                'en.name' => ['required', Rule::unique('product_translations','name')->whereNot('product_id',$this->id)],
                'ar.description' => ['required', Rule::unique('product_translations','description')->whereNot('product_id',$this->id)],
                'en.description' => ['required', Rule::unique('product_translations','description')->whereNot('product_id',$this->id)],
                'ar.divo' => ['required', Rule::unique('product_translations','divo')->whereNot('product_id',$this->id)],
                'en.divo' => ['required', Rule::unique('product_translations','divo')->whereNot('product_id',$this->id)],
                'image' => 'nullable|mimes:jpg,png,jpeg,gif,webp,svg',
                'groupImages' => 'nullable',
                'groupImages.*' => 'mimes:jpg,png,jpeg,gif,webp,svg',
                'price' => 'required|numeric|min:1|',
                'stock' => 'required|numeric|min:1|',
                'weight' => 'required|numeric|min:1|',
                'category_id' => 'required|exists:categories,id|',
                'sale' => 'nullable|numeric|min:0|lt:price|',
                'expiry_date' => 'required|date|after:yesterday',


            ];
        }

        //for store
        return [
            'ar.name' => ['required', Rule::unique('product_translations','name')],
            'en.name' => ['required', Rule::unique('product_translations','name')],
            'ar.description' => ['required', Rule::unique('product_translations','description')],
            'en.description' => ['required', Rule::unique('product_translations','description')],
            'ar.divo' => ['required', Rule::unique('product_translations','divo')],
            'en.divo' => ['required', Rule::unique('product_translations','divo')],
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp,svg',
            'groupImages' => 'required',
            'groupImages.*' => 'mimes:jpg,png,jpeg,gif,webp,svg',
            'price' => 'required|numeric|min:1|',
            'stock' => 'required|numeric|min:1|',
            'weight' => 'required|numeric|min:1|',
            'category_id' => 'required|exists:categories,id|',
            'sale' => 'nullable|numeric|min:0|lt:price|',
            'description_ar' => 'nullable|string|max:255|',
            'description_en' => 'nullable|string|max:255|',
            'expiry_date' => 'required|date|after:yesterday',
        ];
    }
}
