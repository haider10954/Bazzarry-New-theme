<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg',
            'fileUpload.*' => 'mimes:jpeg,png,jpg',
            'manufacturer_name' => 'required',
            'brand' => 'nullable',
            'quantity' => 'min:0',
            'price' => 'min:0',
            'sku' => 'required',
            'discount' => 'min:0',
            'visibility' => 'required',
            'product_tags' => 'required',
            'product_category' => 'required',
        ];
    }
}
