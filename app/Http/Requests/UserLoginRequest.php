<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class UserLoginRequest extends FormRequest
{
    use ApiResponse;
    private mixed $email;
    private mixed $password;

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
     * @return array<string, mixed>
     */
    #[ArrayShape(["email" => "string[]", "password" => "string[]"])]
    public function rules(): array
    {
        return [
            "email" => ['required', 'email', 'exists:App\Models\User,email'],
            "password" => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please email',
            'email.email' => 'email 정규식에 맞지 않음',
            'email.exists' => '없는 이메일임',
            'password' => '비밀번호 입력하셈',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->badRequestResponse($validator->getMessageBag());
        throw new ValidationException($validator, $response);
    }
}
