<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
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
        return [
            'name' => 'required|min:3|max:256',
            'author_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'steam_page' => 'nullable',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ];
    }
}
