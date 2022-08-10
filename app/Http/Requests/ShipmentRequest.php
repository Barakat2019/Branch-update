<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequest extends FormRequest
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
            'shipment_number'=>['required','unique:shipments,number']
        ];
    }
    
    public function messages()
    {
        return [
            'shipment_number.required'=>'Please fill the shipment number',
            'shipment_number.unique'=>'The shipment number already exist'
        ];
    }
}
