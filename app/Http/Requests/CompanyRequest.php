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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email:dns', 'unique:companies', 'unique:applicants'],
            'phone' => ['required', 'unique:companies', 'unique:applicants'],
            'city' => ['required', 'min:4'],
            'address' => ['required', 'min:5'],
            'description' => ['required','min:10'],
            'password' => ['required', 'confirmed', 'min:3']
        ];
    }
}
