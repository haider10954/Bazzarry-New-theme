<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_category' => 'required',
            'title' => 'required|max:50',
            'description' => 'required',
            'fileUpload' => 'array|required',
            'fileUpload.*' => 'mimes:png,jpg,jpeg',
            'price' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'quantity' => 'required',
            'sku' => 'required',
        ];
    }

    public  function messages()
    {
        return [
            'title.required' => "Product title is required",
            'title.max' => "Product title should not be greater than 50 characters",
            'description.required' => 'Product description is required',
            'price.required' => 'Product price is required',
            'price.min' => 'Product price should be greater than 10 Rs.',
            'quantity.min' => 'Product quantity should be greater than 10',
            'sku.required' => 'Product SKU is required',

        ];
    }
}
