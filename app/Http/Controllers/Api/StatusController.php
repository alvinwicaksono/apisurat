<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DesposisimasukResource;
use App\Http\Resources\StatusResources;
use App\Http\Resources\SubbidangResource;
use App\Http\Resources\SuratmasukResource;
use App\Models\Status;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {

//        $status = "Menunggu Desposisi";
        $sts = Status::with('Suratmasuk','User')->fromQuery('Select * FROM status WHERE id IN (SELECT MAX(id) FROM status GROUP BY suratmasuk_id) having status = "'.$status.'"');
//        $sts = Status::with('Suratmasuk','User','Desposisimasuk')->get();

//        return $sts;
//        $surat = $status->Suratmasuk()->get();
//        return response()->json($sts,200);                      <a href="#" class="btn btn-sm bg-warning"> <i class="fas fa-paperclip"></i>Lampiran

        $hasil=StatusResources::collection($sts);

        return response([
            'data' => $hasil
        ],200);
    }

    public function desposisi($status)
    {
        $sts = Status::with('Suratmasuk','User','Desposisimasuk')->fromQuery('Select * FROM status WHERE id IN (SELECT MAX(id) FROM status GROUP BY suratmasuk_id) having status = "'.$status.'"');
        $hasil=DesposisimasukResource::collection($sts);

        return response([
            'data' => $hasil
        ],200);
    }

    public function terdesposisi()
    {
        $sts = Status::with('Suratmasuk','User','Desposisimasuk')->fromQuery('Select * FROM status WHERE id IN (SELECT MAX(id) FROM status GROUP BY suratmasuk_id) having desposisimasuk_id');
        $hasil=DesposisimasukResource::collection($sts);

        return response([
            'data' => $hasil
        ],200);
    }

    public function tracking($id)
    {

        $track = Status::where('suratmasuk_id',$id)->with('Suratmasuk','User')->get();
        return SuratmasukResource::collection($track);

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
