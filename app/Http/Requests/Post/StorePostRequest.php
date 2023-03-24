<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'en.title' => 'required',
            'en.full_text' => 'required',
            'category_id' => 'required',
            'post_image' => 'nullable|image|max:5120|mimes:jpeg,jpg,png',
        ];

        foreach(config('translatable.locales') as $lang => $locale) {
            $rules[$locale . '.title'] = 'string';
            $rules[$locale . '.full_text'] = 'string';
        }
        return $rules;
    }
}
