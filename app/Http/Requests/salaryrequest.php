<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salaryrequest extends FormRequest
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
            'employee_id' => 'required|max:255',
            'basic' => 'required|max:255',

            'hra' => 'required|max:255',


            'overtime' => 'required|max:255',




        ];
    }
}
