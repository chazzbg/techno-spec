<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandlordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'phone' => ['required',
                'regex:/\+?08[789]\d{7}/'
            ],
            'egn' => [
                'required',
                'regex:/^(\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])\d{4})$/',
                'unique:landlords'
            ],
        ];
    }
}
