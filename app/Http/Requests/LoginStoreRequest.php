<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginStoreRequest extends FormRequest
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
            'email'=>'bail|required|email',
            'password'=>'bail|required|min:4',
            'remember_me'=>'nullable',
        ];
    }
}
