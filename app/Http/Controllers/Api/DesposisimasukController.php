<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Desposisimasuk;
use App\Models\Status;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesposisimasukController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function Desposisi(Request $request, Suratmasuk $suratmasuk)
    {
        $arsip = $request->arsip;
        //Mengisi Desposisi Surat Masuk
        $newDesposisi = new Desposisimasuk();
        $newDesposisi->suratmasuk_id = $suratmasuk->id;
        $newDesposisi->penerima_id = $request->penerima_id;
        $newDesposisi->pic = $request->pic;
        $newDesposisi->instruksi = $request->instruksi;
        $newDesposisi->isi_desposisi = $request->isi_desposisi;
        $newDesposisi->kecepatan = $request->kecepatan;
        $newDesposisi->tgl_selesai = $request->tgl_selesai;
        $newDesposisi->arsip = $request->arsip;

        $newDesposisi->save();

        //Memberi Status surat
        $newStatus = new Status();
        $newStatus->suratmasuk_id = $request->suratmasuk_id;
        $newStatus->status = "Terdesposisi";
        $newStatus->user_id = Auth::user()->id;
        return "Surat Berhasil Terdesposisi";

        //cek arsip
        if($arsip==1){
            $newStatus = new Status();
            $newStatus->suratmasuk_id = $request->suratmasuk_id;
            $newStatus->status = "Menunggu Arsip";
            $newStatus->user_id = Auth::user()->id;
            return "Surat Menunggu Arsip";
        }else{
            $newStatus = new Status();
            $newStatus->suratmasuk_id = $request->suratmasuk_id;
            $newStatus->status = "Selesai";
            $newStatus->user_id = Auth::user()->id;
            return "Surat Masuk telah selesai diproses";
        };





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
