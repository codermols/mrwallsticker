<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        $this->merge(['is_customizable' => $this->get('is_customizable', false)]);
        $this->merge(['is_downloadable' => $this->get('is_downloadable', false)]);
        return [
            'name'              => 'required',
            'sku'               => 'required|unique:products,sku,' . $this->get('id'),
            'image'             => 'required_without:has_image|mimes:jpg,jpeg,png',
            'price'             => 'required|numeric',
            'description'       => 'required',
            'category_name'     => 'required',
            'is_customizable'   => 'boolean',
            'is_downloadable'   => 'boolean' 
        ];
    }
}
