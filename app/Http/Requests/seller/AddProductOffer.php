<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class AddProductOffer extends FormRequest
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
            'description' => 'required',
            'product' => 'required',
            'category' => 'required',
            'banner_image' => 'required|mimes:png,jpg,jpeg',
            'end_date' => 'required',
            'Discount' => 'required',
        ];
    }
}
