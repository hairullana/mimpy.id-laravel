<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:dns', 'unique:companies', 'unique:applicants'],
            'phone' => ['required', 'unique:companies', 'unique:applicants'],
            'gender' => ['required'],
            'address' => ['required', 'min:5'],
            'password' => ['required', 'confirmed', 'min:3']
        ];
    }
}
