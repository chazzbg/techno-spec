<?php

namespace App\Http\Controllers;


use App\Http\Requests\PropertyLandlordRequest;
use App\Http\Resources\PropertyLandlordResource;
use App\Property;
use App\PropertyLandlord;


class PropertyLandlordController extends Controller
{

    public function index()
    {

    }

    public function store(PropertyLandlordRequest $request)
    {
        $pl = PropertyLandlord::create($request->all());

        $property = Property::find($pl->id_property);

        return new PropertyLandlordResource($property);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id_property_landlord
     *
     * @return PropertyLandlordResource
     */
    public function show($id_property_landlord)
    {
        $propertyLandlord = PropertyLandlord::findOrFail($id_property_landlord);
        $property         = Property::findOrFail($propertyLandlord->id_property);

        return new PropertyLandlordResource($property);
    }

    public function update()
    {

    }
}
