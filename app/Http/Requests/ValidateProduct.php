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
        // 'name' => 'required|string|max:255',
        // 'description' => 'nullable|string',
        // 'price' => 'required|numeric|min:0',
        // 'sale' => 'nullable|numeric|min:0|lte:price',

        // 'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        // 'category_id' => 'required|integer',
        // 'tag' => 'nullable|string|max:255',
        // 'latest' => 'required|boolean',
        // 'status' => 'required|boolean',
        'name'        => 'required|string|max:255|unique:products,name',
        'description' => 'nullable|string|max:5000',
        'price'       => 'required|numeric|min:0',
        'sale'        => 'nullable|numeric|min:0|lte:price',
        'inpFile_1'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'new_category' =>'nullable',
        'category_id' => 'required|not_in:add',
        'tag'         => 'nullable|string|max:255',
        'latest'      => 'required|boolean',
        'status'      => 'required|boolean',   
            
        ];
        }
        public function messages(): array
        {
            return [
                
            ];
        }

}
