<?php

namespace App\Http\Requests\Dashboard\ProjectsManagement;

use App\Models\CriteriaForEvaluatingDesignProjects;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class DesignCriteriaRequest extends FormRequest
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
            $sum= number_format((float) 100.00-( number_format(CriteriaForEvaluatingDesignProjects::where('id','!=',$this->id)->get()->sum('percentage'))),2);

            if(number_format($sum +(float) $this->percentage,2)< 0)
             throw ValidationException::withMessages(['message' => 'You can not update this criteria because The summation of the percentages of design criteria is greater than 100']);

            return [
                'ar.name' => ['required', Rule::unique('criteria_design_translations','name')->whereNot('criteria_id',$this->id)],
                'en.name' => ['required', Rule::unique('criteria_design_translations','name')->whereNot('criteria_id',$this->id)],
                'percentage' => 'required|numeric|min:0.1|lte:'.$sum
            ];
        }

        $sum=number_format((float) 100.00-( number_format(CriteriaForEvaluatingDesignProjects::get()->sum('percentage'),2)),2);

        if($sum == 0)
         throw ValidationException::withMessages(['message' => 'You can not add new criterion because The summation of the percentages of design criteria is equal 100']);

        //for store
        return [
            'ar.name' => ['required', Rule::unique('criteria_design_translations','name')],
            'en.name' => ['required', Rule::unique('criteria_design_translations','name')],
            'percentage' => 'required|numeric|min:0.1|lte:'.$sum
        ];
    }
}
