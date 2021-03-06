<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class OfficeRequest extends FormRequest
{
    use ApiResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string[]", 'timezone' => "string[]", 'address' => "string[]", 'user_id' => "string[]", 'open_time' => "string[]", 'close_time' => "string[]"])]
    public function rules(): array
    {
        //Africa/Abidjan
        //Africa/Accra
        //Africa/Addis_Ababa
        //Africa/Algiers
        //Africa/Asmara
        return [
            'name' => ['required', 'string'],
            'timezone' => ['required', 'timezone'],
            'address' => ['required', 'string'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'open_time' => ['required'],
            'close_time' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->badRequestResponse($validator->getMessageBag());
        throw new ValidationException($validator, $response);
    }
}
