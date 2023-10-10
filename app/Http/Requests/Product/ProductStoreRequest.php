<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'brand' => 'required|string',
            'model' => 'required|string',
            'stock' => 'required|integer',
            'uri_photo' => 'required|image',
            'qr_code' => 'nullable',
            'warehouse_id' => 'required|integer',
            'category_id' => 'required|integer'
        ];
    }
}
