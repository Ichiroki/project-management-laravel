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
            'name' => 'required|max:255|unique:projects,name',
            'client' => 'required',
            'status' => 'required',
            'budget' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Column name must be filled',
            'name.max' => 'Column name at least have maximal 255 characters',
            'name.unique' => 'This name is exist',
            'client.required' => 'Column Client must be filled',
            'status.required' => 'Column Status must be filled',
            'budget.required' => 'Column Budget must be filled',
            'description.required' => 'Column Description must be filled'
        ];
    }
}
