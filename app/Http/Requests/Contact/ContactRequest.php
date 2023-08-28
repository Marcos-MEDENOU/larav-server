<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'contact_lastname' => [
                'required',
                'string',
                'max:150'
            ],
            'contact_firstname' => [
                'required',
                'string',
                'max:150',
            ],
            'contact_entreprise' => [
                'required',
                'string',
                'max:90'
            ],
            'contact_function' => [
                'required',
                'string',
            ],
            'contact_phonenumber' => [
                'required',
                'numeric',
                'max:150'
            ],
            'contact_email' => [
                'required',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                
            ],
            'contact_message' => [
                'required',
                'string',
                
            ],
           
        ];
    }
}
