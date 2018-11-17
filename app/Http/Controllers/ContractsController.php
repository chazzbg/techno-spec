<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractProperty;
use App\Http\Requests\ContractRequest;
use App\Http\Resources\ContractResource;
use App\Http\Resources\GenericResource;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ContractRequest $request
     *
     * @return ContractResource
     */
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->except('properties'));

        if($contract){
            foreach ($request->get('properties') as $item) {
                ContractProperty::create([
                    'id_contract'=>$contract->id,
                    'id_property'=> $item
                ]);
           }
        }
        return new ContractResource($contract);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract $contracts
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contracts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contracts
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contracts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contracts
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contracts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contracts
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contracts)
    {
        //
    }
}
