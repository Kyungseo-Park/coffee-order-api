<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $product_id
 * @property mixed $options
 * @property mixed $star
 */
class OrderRequest extends FormRequest
{
    use ApiResponse;
    /**
     * 회원만 주문 가능함.
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->can('place-an-order');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['product_id' => "string[]", 'options' => "string[]", 'star' => "string[]"])]
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:App\Models\Product,id'],
            'options' => ['array'],
            'star' => ['nullable', 'boolean'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->badRequestResponse($validator->getMessageBag());
        throw new ValidationException($validator, $response);
    }
}
