<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class InvitationRequest extends FormRequest
{
    use ApiResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return User|bool
     */
    public function authorize(): User|bool
    {
        return auth('master')->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(["name" => "string[]", "email" => "string[]", "office_id" => "string[]"])]
    public function rules(): array
    {
        return [
            "name" => ["required", "string"],
            "email" => ["required", "email", "unique:users"],
            "office_id" => ["required", 'exists:App\Models\Office,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->badRequestResponse($validator->getMessageBag());
        throw new ValidationException($validator, $response);
    }

}
