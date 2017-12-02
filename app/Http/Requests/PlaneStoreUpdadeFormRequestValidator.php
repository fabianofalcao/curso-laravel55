<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class PlaneStoreUpdadeFormRequestValidator extends FormRequest
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
        $id = Request::segment(3);
        return [
            'name' => "required|min:3|max:100|unique:planes,name,{$id},id",
            'brand_id' => "required|exists:brands,id",
            'class' => "required|in:economic,luxury",
            'qty_passengers' => "required|integer"
        ];
    }
}
