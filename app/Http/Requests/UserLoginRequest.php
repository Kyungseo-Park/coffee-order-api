<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UserLoginRequest extends FormRequest
{
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
}
