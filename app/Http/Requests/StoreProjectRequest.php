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
            'project_name' => 'required|max:255|unique:projects,project_name',
            'project_division' => 'required',
            'project_client' => 'required',
            'project_status' => 'required',
            'project_budget' => 'required',
            'project_description' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'project_name.required' => 'Column name must be filled',
            'project_name.max' => 'Column name at least have maximal 255 characters',
            'project_name.unique' => 'This name is exist',
            'project_division.required' => 'Column Division must be filled',
            'project_client.required' => 'Column Client must be filled',
            'project_status.required' => 'Column Status must be filled',
            'project_budget.required' => 'Column Budget must be filled',
            'project_description.required' => 'Column Description must be filled'
        ];
    }
}
