<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'=>['required','min:5'],
            'phone'=>['required'],
            'email'=>['email']
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Please enter name',
            'name.min'=>'must be at least 5 character',
            'phone.required'=>'please fill the phone',
            'email.email'=>'invalid email'
            
        ];
    }
}
