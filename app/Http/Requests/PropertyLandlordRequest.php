<?php

namespace App\Http\Requests;

use App\PropertyLandlord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class PropertyLandlordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        \Validator::extend('percentile', function ($attribute, $value, $parameters, Validator $validator) {
            $sum = (float) PropertyLandlord::where('id_property',$this->request->get('id_property'))
                ->sum('share');

            return (float)$value + $sum <= 100;
        });

        \Validator::extend('duplication', function ($attribute, $value, $parameters, Validator $validator) {
            $exists = PropertyLandlord::where('id_property',$this->request->get('id_property'))
                ->where('id_landlord',$this->request->get('id_landlord'))
                                           ->exists();

            return !$exists;
        });
        return [
            'id_property'=>'required|exists:properties,id',
            'id_landlord'=>'required|exists:landlords,id',
            'share' => 'required|between:0.01,100.00|duplication|percentile'
        ];
    }
}
