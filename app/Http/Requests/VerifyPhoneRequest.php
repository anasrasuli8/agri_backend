<?php

namespace App\Http\Requests;

use App\Rules\CodeRule;
use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class VerifyPhoneRequest extends FormRequest
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
            'phone' => ['required', new PhoneNumberRule()],
            'code' =>  ['required','numeric', new CodeRule($this->phone)]

        ];
    }
}
