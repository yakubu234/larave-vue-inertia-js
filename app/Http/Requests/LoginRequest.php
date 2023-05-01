<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use ApiResponseTrait, EncryptionTrait;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.exists' => 'Email already exist!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password can only be minimum of 6 characters',
        ];
    }
}
