<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DeleteRequest extends FormRequest
{
    use ApiResponseTrait, EncryptionTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException($this->error(
            'Validation errors',
            422,
            $validator->errors()
        ));
    }

    public function messages(): array
    {
        return [
            'user_id.required'  => 'An Encrypted id is required',
            'user_id.integer' => 'You are to pass an encrypted user id'
        ];
    }

    protected function passedValidation()
    {
    }

    protected function prepareForValidation()
    {
        if ($this->request->has('user_id')) {
            $this->merge([
                'user_id' => $this->decryption($this->user_id)
            ]);
        }
    }
}
