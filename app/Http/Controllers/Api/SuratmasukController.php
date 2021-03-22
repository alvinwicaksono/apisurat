<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_list()
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $newSurat = new Suratmasuk();
        $newSurat->nomor_surat = $request->nomor_surat;
        $newSurat->tgl_dokumen = $request->tgl_dokumen;
        $newSurat->bidang_id = $request->bidang_id;
        $newSurat->subBidang_id = $request->subBidang_id;
        $newSurat->nama_surat = $request->nama_surat;
        $newSurat->sumber_surat = $request->sumber_surat;
        $newSurat->perihal = $request->perihal;
        $newSurat->tgl_masuk = $request->tgl_masuk;
        $newSurat->isi_surat = $request->isi_surat;
        $newSurat->file = $request->file;
        $newSurat->format = $request->format;
        $newSurat->prioritas = $request->prioritas;
        $newSurat->keterangan = $request->keterangan;

        $newSurat->save();

        $newStatus = new Status();
        $newStatus->suratmasuk_id = Suratmasuk::max('id');
        $newStatus->status = "Teregistrasi";
        $newStatus->user_id = Auth::user()->id;
        $newStatus->save();

        return "surat teregistrasi";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Suratmasuk $suratmasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratmasuk $suratmasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suratmasuk $suratmasuk)
    {
        //
    }


    public function waiting(Suratmasuk $suratmasuk)
    {
        //mengubah value sent pada data suratmasuk
        $surat=Suratmasuk::where('id',$suratmasuk->id);
        $surat->sent = 1;
        $surat->save();

        //Mengubah status surat menjadi Menunggu Desposisi
        $newStatus = new Status();
        $newStatus->suratmasuk_id = $suratmasuk->id;
        $newStatus->status = "Menunggu Desposisi";
        $newStatus->user_id = Auth::user()->id;

    }
}
