<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],$messages=[
            'name.required'=>'please fill the name',
            'email.required'=>'please fill the email',
            'phone.required'=>'please fill the phone'
        ])->validate();
       
    
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone'=>$input['phone'],
            'age'=>$input['age'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
