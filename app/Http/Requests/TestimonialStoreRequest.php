<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialStoreRequest extends FormRequest
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
            'client_name' => 'bail|required|string|max:255',
            'client_designation' => 'bail|required|string|max:255',
            'client_message' => 'bail|required|string',
            'client_image' => 'nullable|image|max:1024',
        ];
    }
}
