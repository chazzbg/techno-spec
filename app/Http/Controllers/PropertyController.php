<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenericResource;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return GenericResource::collection(Property::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return GenericResource
     */
    public function store(Request $request)
    {
        return new GenericResource(Property::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property $property
     *
     * @return GenericResource
     */
    public function show(Property $property)
    {
        return new GenericResource($property);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Property $property
     *
     * @return GenericResource
     */
    public function update(Request $request, Property $property)
    {
        $all = $request->all();
        $property->update($all);
        return new GenericResource($property);
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
