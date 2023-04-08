<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class AddAdvertisementRequest extends FormRequest
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
            'description' => 'required|max:250',
            'banner_image' => 'required|mimes:png,jpg,jpeg',
            'product' => 'required',
        ];
    }

    public  function messages()
    {
        return [
            'description.max' => "Advertisement description should not be greater than 250 characters",
        ];
    }
}
