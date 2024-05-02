<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseRequest;

class CreateProductRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->isMerchantUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "product" => "required|string|max:255"
        ];
    }

    public function messages()
    {
        return [
            'product.required' => 'Product is required',
            'product.string' => 'Product must be a string',
            'product.max' => 'Product must not exceed 255 characters',
        ];
    }

    public function parameters(): array
    {
        return [
            'product' => ucwords($this->input('product')),
        ];
    }
}
