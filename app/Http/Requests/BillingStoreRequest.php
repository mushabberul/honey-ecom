<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingStoreRequest extends FormRequest
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
            'fullname'=>'bail|required|string',
            'email'=>'bail|required|email',
            'phone'=>'bail|required|string',
            'district_id'=>'bail|required|numeric',
            'upazila_id'=>'bail|required|numeric',
            'address'=>'bail|required|string',
            'note'=>'nullable|string',
        ];
    }
}
