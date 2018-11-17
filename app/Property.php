<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['number','area'];

    public function contracts()
    {
        return $this->belongsToMany(
            Contract::class,
            'contract_properties',
            'id_property',
            'id_contract'
        );
    }

    public function landlords()
    {
        return $this->belongsToMany(Landlord::class,'property_landlords','id_property','id_landlord')->withPivot('share');
    }
}
