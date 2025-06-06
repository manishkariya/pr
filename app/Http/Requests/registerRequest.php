<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',

            'email' => 'required|max:255',

            'password' => 'required|max:255',


        ];
    }
    public function messages()
    {
        return [

            'email' => 'The middle name field is required.',
            'last_name.required' => 'The last name field is required.',


        ];
    }
}
