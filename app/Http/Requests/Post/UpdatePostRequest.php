<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'post_title_eng' => 'required',
            'post_title_ukr' => 'required',
            'category_id' => 'required',
            'details_eng' => 'required',
            'details_ukr' => 'required',
            'post_image' => 'nullable|image|max:5120|mimes:jpeg,jpg,png',
        ];
    }
}
