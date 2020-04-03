<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'city_id' => 'required|integer',
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'numeric',
            'currency' => 'string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png|max:1000'
        ];

        return $rules;
    }
}
