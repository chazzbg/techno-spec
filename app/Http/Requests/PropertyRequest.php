<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class PropertyRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        \Validator::extend('percentile', function ($attribute, $value, $parameters, Validator $validator) {
            $shares = $this->request->get('shares');
            $shares = array_map(function ($share){
                return (float)$share;
            }, $shares);

            $sum = array_sum($shares);
            return $sum === 100.0;
        });
        return [
            'number' => 'required|unique:properties',
            'area' => 'required',
            'landlords'=> 'required',
            'landlords.*' => 'required|exists:landlords,id',
            'shares.*' => 'required|percentile'
        ];
    }
}
