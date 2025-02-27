<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'en.category_name' => 'required|max:255|unique:categories',
            'category_logo' => 'image|max:5120|mimes:jpeg,jpg,png|dimensions:min_width=200,min_height=200',
        ];

        foreach(config('translatable.locales') as $lang => $locale) {
            $rules[$locale . '.category_name'] = 'string|max:255';
        }
        return $rules;
    }
}
