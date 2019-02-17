<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name'=>'requierd|max:255|unique:products',
            'description'=>'requierd',
            'price'=>'requierd|max:10',
            'stock'=>'requierd|max:6',
            'discount'=>'requierd|max:2',
        ];
    }
}
