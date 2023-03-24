<?php

namespace App\Http\Requests\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
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
            'en.subcategory_name' => 'required|max:255|unique:subcategories',
            'category_id' => 'required',
        ];

        foreach(config('translatable.locales') as $lang => $locale) {
            $rules[$locale . '.subcategory_name'] = 'string|max:255';
        }
        return $rules;
    }
}
