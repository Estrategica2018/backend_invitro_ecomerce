<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'detail' => 'required',
            'price' => 'required',
            'image_url' => 'required',
            'slide_images_url' => '',
            'service_relationship' => 'required',
            'product_relationship' => 'required',
        ];
    }
}
