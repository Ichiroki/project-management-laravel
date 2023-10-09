<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'avatar' => 'file|mimes:jpg,jpeg,png',
            'name' => 'required',
            'email' => 'required|unique:users,email|email:rfc',
            'password' => 'required|max:255|min:8',
        ];
    }

    public function messages(): array {
        return [
            'avatar.file' => 'This Column must be a picture',
            'avatar.mimes' => 'This is not a valid picture',
            'name.required' => 'Column Last Name must be filled',
            'email.required' => 'Column Email must be filled',
            'email.unique' => 'This email is already exist',
            'email.email' => 'This is not a valid email',
            'password.required' => 'Column Password must be filled',
            'password.max' => 'Maximal characters for password is 255',
            'password.min' => 'Minimum characters for password is 8',
        ];
    }
}
