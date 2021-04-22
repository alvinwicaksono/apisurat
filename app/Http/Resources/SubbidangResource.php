<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubbidangResource extends JsonResource
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
            "id"=>$this->id,
            "kode_bidang"=>$this->kode_subBidang,
            "nama_subBidang"=>$this->nama_subBidang,
            "bidang"=>$this->Bidang->nama_bidang
        ];
    }
}
