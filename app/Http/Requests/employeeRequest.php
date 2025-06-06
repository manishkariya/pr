<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class employeeRequest extends FormRequest
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
            'middlename' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'age' => 'required',

            'department' => 'required',

            'designation' => 'required',
            'country' => 'required',

            'state' => 'required',

            'city' => 'required',







               // 'group-a' => 'required|array|min:0',
                'group-a.*.totalexperience' => 'required|string|max:255',
                'group-a.*.role' => 'required|max:255',
                'group-a.*.company_name' => 'required|string|max:255',
               'group-a.*.start_date' => 'required|date',
                'group-a.*.end_date' => 'required',






        ];
    }
    public function messages()
{
    return [
        'first_name.required' => 'The first  name field is required.',
        'middle_name.required' => 'The middle name field is required.',
        'last_name.required' => 'The last name field is required.',
        'group-a.*.totalexperience.required' => 'Total experience is required.',
            'group-a.*.company_name.required' => 'Company name is required.',
            'group-a.*.start_date.required' => 'Start date is required.',
            'group-a.*.end_date.required' => 'End date is required.',
            'group-a.*.end_date.after_or_equal' => 'End date must be after or equal to the start date.',

    ];
}
}
