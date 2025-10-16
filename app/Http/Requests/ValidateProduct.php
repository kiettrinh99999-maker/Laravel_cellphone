<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'sale' => 'nullable|numeric|min:0|lte:price',

        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        'category_id' => 'required|integer',
        'tag' => 'nullable|string|max:255',
        'latest' => 'required|boolean',
        'status' => 'required|boolean',
        ];
        }
        public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'image1.image' => 'Ảnh phải đúng định dạng (jpeg, png...).',
            'sale.lte' => 'Giá giảm không được lớn hơn giá gốc.',
        ];
    }

}
