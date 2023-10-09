<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'avatar' => 'file|mimes:jpg,jpeg,png|size:9166',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email:rfc',
            'born' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'password' => 'required|max:255|min:8',
        ];
    }

    public function messages(): array {
        return [
            'avatar.file' => 'This Column must be a picture',
            'avatar.mimes' => 'This is not a valid picture',
            'firstName.required' => 'Column First Name must be filled',
            'lastName.required' => 'Column Last Name must be filled',
            'email.required' => 'Column Email must be filled',
            'email.email' => 'This is not a valid email',
            'born.required' => 'Column Born must be filled',
            'address.required' => 'Column Address must be filled',
            'city.required' => 'Column City must be filled',
            'state.required' => 'Column State must be filled',
            'password.required' => 'Column Password must be filled',
            'password.max' => 'Maximal characters for password is 255',
            'password.min' => 'Minimum characters for password is 8',
        ];
    }
}
