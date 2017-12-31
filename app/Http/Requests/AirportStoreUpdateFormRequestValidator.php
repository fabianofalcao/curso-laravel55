<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportStoreUpdateFormRequestValidator extends FormRequest
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
        $id = $this->segment(5);
        
        return [
            'name'          => "required|min:3|max:100|unique:airports,name,{$id},id",
            'latitude'      => 'required|regex:/^[\d,.-]+$/',
            'longitude'     => 'required|regex:/^[\d,.-]+$/',
            'address'       => 'required|min:3|max:100',
            'number'        => 'required|regex:/^[\d,.-SsNn]+$/',
            'district'      => 'required|max:100',
            'zip_code'      => 'required|regex:/^[\d-]+$/',
            'complement'    => 'max:191',
        ];
    }
}
