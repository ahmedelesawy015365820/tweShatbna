<?php

namespace App\Http\Requests\Dashboard\ProjectsManagement;

use App\Models\CompanyPhases;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CompanyPhasesRequest extends FormRequest
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
            $sum= number_format((float) 100.00-( number_format(CompanyPhases::where('id','!=',$this->id)->get()->sum('client_percentage'))),2);

            if(number_format($sum +(float) $this->client_percentage,2)< 0)
             throw ValidationException::withMessages(['message' => 'You can not update this phase because The summation of client percentages of company phases is greater than 100']);


            return [
                'ar.name' => ['required', Rule::unique('company_phases_translations','name')->whereNot('phase_id',$this->id)],
                'en.name' => ['required', Rule::unique('company_phases_translations','name')->whereNot('phase_id',$this->id)],
                'image' => 'nullable|mimes:jpg,png,jpeg,gif,webp,svg',
                'client_percentage' => 'required|numeric|min:0.1|lte:'.$sum,
                'company_percentage' => 'required|numeric|min:0.1|lte:client_percentage'
            ];
        }

        $sum=number_format((float) 100.00-( number_format(CompanyPhases::get()->sum('client_percentage'),2)),2);

        if($sum == 0)
         throw ValidationException::withMessages(['message' => 'You can not add new Phase because The summation of the client percentages of company phases is equal 100']);

        //for store
        return [
            'ar.name' => ['required', Rule::unique('company_phases_translations','name')],
            'en.name' => ['required', Rule::unique('company_phases_translations','name')],
            'image' => 'required|mimes:jpg,png,jpeg,gif,webp,svg',
            'client_percentage' => 'required|numeric|min:0.1|lte:'.$sum,
            'company_percentage' => 'required|numeric|min:0.1|lte:client_percentage'
        ];
    }
}
