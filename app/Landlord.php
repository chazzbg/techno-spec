<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $fillable = ['firstname','lastname','phone','egn'];
}
