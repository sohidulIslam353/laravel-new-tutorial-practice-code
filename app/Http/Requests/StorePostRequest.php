<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|string|min:11|max:11',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'tumar name deya nai',
            'email.required' => 'tumar email deya nai',
            'phone.required' => 'tumar phone number deya nai',
        ];
    }
}
