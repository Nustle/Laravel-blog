<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'mimes:jpeg,jpg,bmp,png|dimensions:min_width=100,min_height=200',
            'title' => 'required|min:3|max:255',
            'tagline' => 'required|min:3|max:255',
            'announce' => 'required|min:3',
            'fulltext' => 'required|min:3'
        ];
    }
}
