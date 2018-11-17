<?php

namespace App\DataProviders;

use App\Contract;
use App\Enum\ContractEnum;
use DB;
use Illuminate\Database\Query\Builder;

class RentDueDataprovider implements DataProviderInterface
{

    use FilteringTrait;
    /**
     * @var Builder
     */
    private $builder;

    public function __construct()
    {
        $this->builder = Contract::query();
        $this->builder->leftJoin('contract_properties', 'contracts.id', '=', 'contract_properties.id_contract')
                      ->leftJoin('properties', 'contract_properties.id_property', '=', 'properties.id')
                      ->join('property_landlords', 'properties.id', '=', 'property_landlords.id_property')
                      ->join('landlords', 'property_landlords.id_landlord', '=', 'landlords.id');

        $this->builder->where('contracts.type', '=', ContractEnum::TYPE_RENT);
    }



    public function getData()
    {

        $collection = $this->builder->paginate(15,
            [
                'contracts.number',
                'contracts.type',
                'contracts.price',
                'contracts.valid_from',
                'contracts.valid_to',
                'properties.number as property_number',
                'properties.area',
                'landlords.firstname',
                'landlords.lastname',
                'property_landlords.share'
            ]
        );

        $collection->each(function ($data){
            $data->landlord_ownership = (float)$data->area * ($data->share / 100);
            $data->landlord_due_rent = (float)$data->price * ($data->share / 100);

        });
        return $collection;

    }
}
