<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            // Step 1 - Client Details
            'name'          => 'required|string|max:255',
            'mobile_no'     => 'required|numeric|digits_between:7,15',
            'country'       => 'required|string|max:100',
            'email'         => 'required|email|max:255',
            'address'       => 'required|string|max:500',
            'company_name'  => 'required|string|max:255',
            'website'       => 'required|url|max:255',

            // Step 2 - Project Details
            'title'         => 'required|string|max:255',
            'status'        => 'required|in:active,completed,on-hold',
            'description'   => 'required|string|max:1000',
            'deadline'      => 'required|date|after_or_equal:today',

            // Step 3 - Budget
            'budget'        => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => 'Status must be Active, Completed, or On-Hold.',
            'deadline.after_or_equal' => 'Deadline must be today or a future date.',
        ];
    }
}
