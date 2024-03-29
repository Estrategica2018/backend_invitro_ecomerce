<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'image_url' => 'required',
            'slide_images_url' => '',
            'category_id' => 'required',
            'service_relationship' => 'required',
            'product_relationship' => 'required',
            'attributes' => 'required',
            'detail' => 'required',

        ];
    }
}
