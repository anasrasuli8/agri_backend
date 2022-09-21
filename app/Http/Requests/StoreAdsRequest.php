<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdsRequest extends FormRequest
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
            'name' => ['required','string'],
            'price' => ['required','string'],
            'phone' => ['required',new PhoneNumberRule()],
            'address' => ['required','string'],
            'email' => ['required','email'],
            'category_id' => ['required','integer'],
            'photo' => 'required|file|mimes:png,jpeg,jpg',
            'description' => ['required','string'],
        ];
    }
}
