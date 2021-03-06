<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubbidangCollection;
use App\Http\Resources\SubbidangResource;
use App\Models\Status;
use App\Models\Subbidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $status = "Menunggu Desposisi";
////        $subBidang = DB::select('SELECT * FROM status WHERE id IN (SELECT MAX(id) FROM status GROUP BY suratmasuk_id) having status = "'.$status.'"');
//        $subBidang = Status::fromQuery('Select * FROM status WHERE id IN (SELECT MAX(id) FROM status GROUP BY suratmasuk_id)');



        $subBidang = Subbidang::with('Bidang')->get();
        $hasil =  SubbidangResource::collection($subBidang);
        return response(
            ['data'=>$hasil],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $subBidang = new Subbidang();
        $subBidang->kode_subBidang = $request->kode_subBidang;
        $subBidang->nama_subBidang = $request->nama_subBidang;
        $subBidang->bidang_id = $request->bidang_id;
        $subBidang->save();

        return "Data Berhasil ditambahkan";
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
