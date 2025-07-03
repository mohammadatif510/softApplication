<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'role_category_id' => 'required|exists:role_categories,id',
            'role_id'          => 'required|exists:roles,id',
            'team_leader_id'   => 'required|exists:users,id',
            'description'      => 'nullable|string|max:1000',
            'members'      => 'required|array|min:1',
            'members.*'    => 'exists:users,id',
            'project_id'       => 'required|exists:projects,id',
        ];
    }
}
