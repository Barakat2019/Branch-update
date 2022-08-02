<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company'=>['required','array'],
            'company.*.name'=>['required','max:255'],
            'company.*.location'=>['required','max:255'],       
        ];
    }

    public function messages()
    {
        return [
            'company.*.name.required'=>'Please fill the company name',
            'company.*.name.min'=>"Name must be at least :min character",
            'company.*.required'=>'Please fill the location information'
        ];
    }
}
