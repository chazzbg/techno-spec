<?php

namespace App\Http\Controllers;

use App\DataProviders\OwnPropertiesDataprovider;
use App\DataProviders\RentDueDataprovider;
use App\Http\Resources\GenericResource;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function dueRentProperties(Request $request)
    {

        $data = new RentDueDataprovider();
        $data->filter($request->only([
            'contract',
            'property',
            'landlord',
            'date'
        ]));

        return GenericResource::collection($data->getData());
    }

    public function ownProperties(Request $request)
    {
        $data = new OwnPropertiesDataprovider();
        $data->filter($request->only([
            'contract',
            'property',
            'landlord',
            'date'
        ]));

        return GenericResource::collection($data->getData());
    }
}
