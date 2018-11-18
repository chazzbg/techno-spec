<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 11/17/18
 * Time: 9:12 PM
 *
 */

namespace App\DataProviders;

use Illuminate\Database\Query\Builder;

/**
 * Trait FilteringTrait
 * @package App\DataProviders
 *
 * @property Builder $builder
 */
trait FilteringTrait
{

    public function filter(array $filters): void
    {
        foreach ($filters as $filter => $value) {
            if(empty($value)) {continue;}
            if($filter==='date'){
                $this->builder->where('contracts.valid_from','<=',$value)
                              ->where('contracts.valid_to','>=',$value);
            }
            if($filter === 'property'){
                $this->builder->where('properties.number','=',$value);
            }
            if($filter === 'landlord'){
                $this->builder->where('landlords.firstname','LIKE','%'.$value.'%')
                    ->orWhere('landlords.lastname','LIKE','%'.$value.'%')
                    ->orWhere('landlords.phone','=',$value)
                    ->orWhere('landlords.egn','=', $value);
            }
            if($filter === 'contract'){
                $this->builder->where('contracts.number','=',$value);
            }
        }
    }
}
