<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class StatusResources extends JsonResource
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
            "suratmasuk_id"=>$this->suratmasuk_id,
            "nomor_surat"=>$this->Suratmasuk->nomor_surat,
            "tgl_dokumen"=>$this->Suratmasuk->tgl_dokumen,
            "bidang"=>$this->Suratmasuk->Subbidang->Bidang->nama_bidang,
            "subBidang"=>$this->Suratmasuk->SubBidang->nama_subBidang,
            "nama_surat"=>$this->Suratmasuk->nama_surat,
            "sumber_surat"=>$this->Suratmasuk->sumber_surat,
            'perihal'=>$this->Suratmasuk->perihal,
            "tgl_masuk"=>$this->Suratmasuk->tgl_masuk,
            "isi_surat"=>$this->Suratmasuk->isi_surat,
            "file"=>$this->Suratmasuk->file,
            "format"=>$this->Suratmasuk->format,
            "prioritas"=>$this->Suratmasuk->prioritas,
            "read"=>$this->Suratmasuk->read,
            "keterangan"=>$this->Suratmasuk->keterangan,
            "status"=>$this->status,
            "Oleh"=>$this->User->name,
            "pada"=>$this->created_at,

        ];
    }
}
