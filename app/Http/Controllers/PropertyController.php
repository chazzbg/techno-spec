<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Resources\GenericResource;
use App\Http\Resources\PropertyLandlordResource;
use App\Property;
use App\PropertyLandlord;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return GenericResource::collection(Property::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PropertyRequest $request
     *
     * @return PropertyLandlordResource
     */
    public function store(PropertyRequest $request)
    {
        $property = Property::create($request->all());

        $landlords = $request->get('landlords');
        $shares = $request->get('shares');
        foreach ($landlords as $k => $item) {
            PropertyLandlord::create([
                'id_property'=> $property->id,
                'id_landlord'=> $item,
                'share' => $shares[$k]
            ]);
        }

        return new PropertyLandlordResource($property);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property $property
     *
     * @return PropertyLandlordResource
     */
    public function show(Property $property)
    {
        return new PropertyLandlordResource($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property $property
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response('', 204);
    }
}
