<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class InvitationPasswordRequest extends FormRequest
{
    use ApiResponse;

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
    #[ArrayShape(["password" => "string[]", "password_confirmation" => "string[]", "invitation_token" => "string[]"])]
    public function rules(): array
    {
        return [
            "password" => ['required', 'string', 'min:8', 'confirmed'],
            "password_confirmation" => ['required', 'string', 'min:8'],
            "invitation_token" => ['required', 'string'],
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $response = $this->badRequestResponse($validator->getMessageBag());
        throw new ValidationException($validator, $response);
    }
}
