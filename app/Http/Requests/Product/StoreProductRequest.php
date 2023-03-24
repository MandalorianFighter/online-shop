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
        $rules = [
            'en.product_name' => 'required|min:2',
            'en.product_details' => 'required|min:100|max:1000',
            'en.color' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'brand_id' => 'nullable',
            'code' => 'required|max:256|unique:products',
            'quantity' => 'required',
            'size' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'nullable',
            'image_one' => 'required|image|max:5120|mimes:jpeg,jpg,png',
            'image_two' => 'required|image|max:5120|mimes:jpeg,jpg,png',
            'image_three' => 'required|image|max:5120|mimes:jpeg,jpg,png',
            'video_link' => 'nullable',
            'main_slider'=> 'nullable',
            'hot_deal' => 'nullable',
            'best_rated' => 'nullable',
            'mid_slider' => 'nullable',
            'hot_new' => 'nullable',
            'buyone_getone' => 'nullable',
            'trend' => 'nullable',
            'status' => 'nullable',
        ];

        foreach(config('translatable.locales') as $lang => $locale) {
            $rules[$locale . '.product_name'] = 'string';
            $rules[$locale . '.product_details'] = 'string';
            $rules[$locale . '.color'] = 'string';
        }
        return $rules;
    }
}
