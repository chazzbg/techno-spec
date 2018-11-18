<?php

namespace App\Http\Controllers;

use App\Http\Requests\LandlordRequest;
use App\Http\Resources\GenericResource;
use App\Landlord;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return GenericResource::collection(Landlord::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param LandlordRequest $request
     *
     * @return GenericResource
     */
    public function store(LandlordRequest $request)
    {

        return new GenericResource(Landlord::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Landlord $landlord
     *
     * @return GenericResource
     */
    public function show(Landlord $landlord)
    {
        return new GenericResource($landlord);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param LandlordRequest $request
     * @param  \App\Landlord $landlord
     *
     * @return GenericResource
     */
    public function update(LandlordRequest $request, Landlord $landlord)
    {
        $all = $request->all();
        $landlord->update($all);
        return new GenericResource($landlord);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Landlord $landlord
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Landlord $landlord)
    {
        $landlord->delete();

        return response('', 204);
    }
}
