<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_picture' => 'file|mimes:jpg,jpeg,png',
            'user_firstName' => 'required',
            'user_lastName' => 'required',
            'user_email' => 'required|unique:users,user_email|email:rfc',
            'user_born' => 'required|date_format:Y-m-d',
            'user_address' => 'required',
            'user_city' => 'required',
            'user_state' => 'required',
            'user_password' => 'required|max:255|min:8',
        ];
    }

    public function messages(): array {
        return [
            'user_picture.file' => 'This Column must be a picture',
            'user_picture.mimes' => 'This is not a valid picture',
            'user_firstName.required' => 'Column First Name must be filled',
            'user_lastName.required' => 'Column Last Name must be filled',
            'user_email.required' => 'Column Email must be filled',
            'user_email.unique' => 'This email is already exist',
            'user_born.required' => 'Column Born must be filled',
            'user_address.required' => 'Column Address must be filled',
            'user_city.required' => 'Column City must be filled',
            'user_state.required' => 'Column State must be filled',
            'user_password.required' => 'Column Password must be filled',
            'user_password.max' => 'Maximal characters for password is 255',
            'user_password.min' => 'Minimum characters for password is 8',
        ];
    }
}
