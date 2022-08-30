<?php

namespace App\Http\Requests\ProductResultCross;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductResultCross extends FormRequest
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
            //
            'service_id' => 'required',
            'product_one_id' => 'required',
            'product_two_id' => 'required',
            'result' => 'required'
        ];
    }
}
