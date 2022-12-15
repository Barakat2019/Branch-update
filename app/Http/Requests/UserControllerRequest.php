<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserControllerRequest extends FormRequest
{
   // protected $redirectRoute='fluent.index';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    protected $errorBag = 'SubmitLogin';
    protected $errorBag1 = 'SubmitLogin1';

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
            'email'=>['required','email'],
             'password'=>Password::defaults()
        ];
    }
     /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
             'email.required'=>'please fill the email before submit',
            'password.required'=>'please fill the password before submit'
        ];
    }

     /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email'=>'email address',
            'password'=>'pass'
        ];
    }

}
