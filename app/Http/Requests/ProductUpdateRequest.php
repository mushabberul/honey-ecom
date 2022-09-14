<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category_name'=>'bail|required|numeric',
            'product_name'=>'bail|required|string|max:255',
            'product_price'=>'bail|required|numeric|min:0',
            'alert_quentity'=>'bail|required|min:1',
            'product_code'=>'bail|required',
            'product_stock'=>'bail|required|numeric|min:1',
            'product_short_description'=>'bail|nullable|string',
            'product_long_description'=>'bail|nullable|string',
            'addissional_info'=>'bail|nullable|string',
            'product_image'=>'bail|nullable|image|max:1024',
        ];
    }
}
