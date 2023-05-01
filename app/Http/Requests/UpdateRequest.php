<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'password' => [Password::min(6)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()],
            'confirm_password' => ['same:password'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name can only be string',
            'password.required' => 'Password is required!',
            'password.min' => 'Password can only be minimum of 6 characters',
            'confirm_password.same' => 'Confrim Password must be the same as password',
            'confirm_password.required' => 'Confirm Password is required and can only be minimum of 6 characters',
        ];
    }

    protected function passedValidation()
    {
        if ($this->request->has('password')) {
            $this->merge([
                'password' => bcrypt($this->password)
            ]);
        }
    }
}
