<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContractRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number'=> 'required',
            'type'=>'required|in:rent,ownership',
            'valid_from'=> 'required|date',
            'valid_to'=> 'required|date|after:valid_from',
            'price' => 'required|',
            'properties' => 'required|array|exists:properties,id'
        ];
    }
}
