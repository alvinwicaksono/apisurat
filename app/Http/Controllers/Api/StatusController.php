<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;

class StatusController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    public function RegistrasiList()
    {
        return Status::where('status','Teregistrasi')->get();
    }

    public function WaitingList()
    {
        return Status::where('status','Menunggu Desposisi')->get();
    }

    public function TerdesposisiList(){
        return Status::where('status','Terdesposisi')->get();
    }

    public function ArsipWaitingList(){
        return Status::where('status','Menunggu Arsip')->get();
    }

    public function ArsipList(){
        return Status::where('status','Diarsipkan')->get();
    }

    public function Selesai(){
        return Status::where('status','Selesai')->get();
    }

    public function Status(Suratmasuk $suratmasuk)
    {
        return Status::where('suratmasuk_id',$suratmasuk->id);
    }
}
