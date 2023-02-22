<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'brand_id' => 'nullable',
            'name' => 'required|min:2|max:256',
            'code' => 'required|max:256|unique:products',
            'quantity' => 'required',
            'color' => 'required',
            'size' => 'required',
            'selling_price' => 'required',
            'details' => 'required|min:100|max:750',
            'image_one' => 'required|image|max:5120|mimes:jpeg,jpg,png',
            'image_two' => 'required|image|max:5120|mimes:jpeg,jpg,png',
            'image_three' => 'required|image|max:5120|mimes:jpeg,jpg,png',
            'video_link' => 'nullable',
            'main_slider'=> 'nullable',
            'hot_deal' => 'nullable',
            'best_rated' => 'nullable',
            'mid_slider' => 'nullable',
            'hot_new' => 'nullable',
            'trend' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
