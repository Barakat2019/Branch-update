<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class Uppercase implements InvokableRule,DataAwareRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if(strtoupper($value)!==$value)
        {
            $fail('The :attribute must be uppercase!');
        }
    }

    public function setData($data)
    {
        $this->data=$data;
        return $this;
    }
}
