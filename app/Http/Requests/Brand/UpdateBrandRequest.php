<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'brand_name' => 'required|max:255|unique:brands,brand_name,' . $this->brand->id, // ['required', 'max:255', Rule::unique('brands')->ignore($this->brand)] / the order of inner valids is important 
            'brand_logo' => 'max:5120|mimes:jpeg,jpg,png|dimensions:min_width=200,min_height=200',
        ];
    }
}
