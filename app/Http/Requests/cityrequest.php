<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cityrequest extends FormRequest
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
            'country_id' => 'required|max:255',
            'stateid' => 'required|max:255',
            'cityname' => 'required|max:255',

        ];
    }
}
