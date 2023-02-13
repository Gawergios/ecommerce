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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>"required|string|unique:products,name," . $this->id,
            "description" => "required|string|max:200",
            "purchase_price" => "required|numeric",
            "sale_price" => "required|numeric",
            "stock" => "required|numeric",
            "categories_id" => "required",
        ];
    }
    public function messages()
    {
        return [
        "categories_id"=>"choose category",
        ];
    }
}
