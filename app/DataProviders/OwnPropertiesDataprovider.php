<?php

namespace App\DataProviders;

use App\Contract;
use App\Enum\ContractEnum;

class OwnPropertiesDataprovider implements DataProviderInterface
{

    use FilteringTrait;
    /**
     * OwnPropertiesDataprovider constructor.
     */
    public function __construct()
    {
        $this->builder = Contract::query();
        $this->builder->leftJoin('contract_properties', 'contracts.id', '=', 'contract_properties.id_contract')
                      ->leftJoin('properties', 'contract_properties.id_property', '=', 'properties.id');

        $this->builder->where('contracts.type', '=', ContractEnum::TYPE_OWN);
    }



    public function getData()
    {

        $collection = $this->builder->paginate(15,
            [
                'contracts.number',
                'contracts.price',
                'contracts.valid_from',
                'contracts.valid_to',
                'properties.number as property_number',
                'properties.area'
            ]
        );

        $collection->each(function ($data){
            $data->price_per_ar = (float)$data->price / (float)$data->area;
        });
        return $collection;

    }
}
