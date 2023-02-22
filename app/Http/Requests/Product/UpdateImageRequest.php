<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
            'image_one' => 'image|max:5120|mimes:jpeg,jpg,png',
            'image_two' => 'image|max:5120|mimes:jpeg,jpg,png',
            'image_three' => 'image|max:5120|mimes:jpeg,jpg,png',
        ];
    }
}
