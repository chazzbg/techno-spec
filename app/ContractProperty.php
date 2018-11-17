<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractProperty extends Model
{
    protected $fillable = [
        'id_contract',
        'id_property'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'id_contract', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'id_property', 'id');
    }
}
