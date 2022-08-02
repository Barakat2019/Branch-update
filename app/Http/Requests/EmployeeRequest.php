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
            'employee.*.name'=>['required'],
            'phone'=>['required_without:id'],
            'email'=>['email']
        ];
    }
    public function messages()
    {
        return [
            'employee.*.name.required'=>'Please enter name',
            'phone.required'=>'please fill the phone',
            'email.email'=>'invalid email'
            
        ];
    }
}
