<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyLandlord extends Model
{
    protected $fillable = ['id_property','id_landlord','share'];

    public function landlord()
    {
        return $this->hasMany(Landlord::class,'id_landlord','id');
    }

    public function property()
    {
        return $this->hasMany(Property::class,'id_property','id');
    }
}
