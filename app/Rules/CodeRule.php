<?php

namespace App\Rules;

use App\Models\SmsCode;
use Illuminate\Contracts\Validation\Rule;

class CodeRule implements Rule
{
    private $phone;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
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
        $record = SmsCode::where('phone', $this->phone)->first();
        if($record){
            if($record->code == $value){
                $record->delete();
                return true;
            }

            $record->try =  $record->try + 1;
            $record->save();
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
        return  'Invalid code entered. please try again!';
    }
}
