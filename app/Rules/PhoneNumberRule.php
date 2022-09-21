<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(preg_match('/^([0-9\s\+]*)$/',$value)){
            if (strlen($value) == 13 && substr($value, 0, 4) == '+992') {
                return true;
            }
            if (strlen($value) == 12 && substr($value, 0, 3) == '+93') {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Enter valid phone number.';
    }
}
