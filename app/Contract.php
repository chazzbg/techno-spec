<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['number','type','valid_from','valid_to','price','properties'];
    public function properties(){
        return $this->belongsToMany(Property::class,
            'contract_properties',
            'id_contract',
            'id_property');
    }
}
