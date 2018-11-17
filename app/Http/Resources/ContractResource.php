<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'number'=>$this->number,
            'type'=> $this->type,
            'valid_from'=>$this->valid_from,
            'valid_to'=>$this->valid_to,
            'price'=> $this->price,
            'properties'=> PropertyLandlordResource::collection($this->properties),
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,

        ];
    }
}
