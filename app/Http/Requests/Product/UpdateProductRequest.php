<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_name' => 'required|min:2|max:256',
            'code' => 'required|max:256|unique:products,code,' . $this->product->id,
            'quantity' => 'required',
            'color' => 'required',
            'size' => 'required',
            'selling_price' => 'required',
            'product_details' => 'required|min:100|max:750',
            'discount_price' => 'nullable',
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
    }
}
