<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResources;
use App\Mail\NotifikasiSekum;
use App\Models\Bidang;
use App\Models\Status;
use App\Models\Subbidang;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'tgl_dokumen' => 'required',
            'subBidang_id' => 'required',
            'nama_surat' => 'required',
            'sumber_surat' => 'required',
            'perihal' => 'required',
            'isi_surat' => 'required',
            'file' => 'required',
            'formats' => 'required',
            'prioritas' => 'required',
        ]);


        //Pembuataan nomor surat
        $subbid = Subbidang::where('id',$request->subBidang_id)->first();
        $bidang = Bidang::where('id',$subbid->bidang_id)->first();
        $y1 = date('Y',strtotime(now()));
        $count = DB::table('suratmasuks')->whereYear('tgl_dokumen',$y1)->count()+1;
        $nomor_surat ="SM/".$y1."/".$bidang->kode_bidang."/".$subbid->kode_subBidang."/".$count;


        //lampiran surat
        $nama = "SM-".$y1."-".$bidang->kode_bidang."-".$subbid->kode_subBidang."-".$count;
        $file_surat= $request->file('file')->storeAs('Suratmasuk/'.$y1,$nama);



        $newSurat = new Suratmasuk();
        $newSurat->nomor_surat = $nomor_surat;
        $newSurat->tgl_dokumen = $request->tgl_dokumen;
        $newSurat->subBidang_id = $request->subBidang_id;
        $newSurat->nama_surat = $request->nama_surat;
        $newSurat->sumber_surat = $request->sumber_surat;
        $newSurat->perihal = $request->perihal;
        $newSurat->tgl_masuk = now();
        $newSurat->isi_surat = $request->isi_surat;
        $newSurat->file = 'Suratmasuk/'.$y1.'/'.$nama;
        $newSurat->format = $request->formats;
        $newSurat->prioritas = $request->prioritas;
       $newSurat->keterangan = $request->keterangan;


        $newSurat->save();

        $newStatus = new Status();
        $newStatus->suratmasuk_id = Suratmasuk::max('id');
        $newStatus->status = "Teregistrasi";
        $newStatus->user_id = '1';
        Suratmasuk::where('id',$newStatus->suratmasuk_id)->update(['status'=>'Teregistrasi']);
        $newStatus->save();

        return "Surat berhasil teregistrasi";
//        return redirect('http://localhost:8001/tsuratmasuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Suratmasuk $suratmasuk)
    {
        $sts = Status::with('suratmasuk','user')->where('suratmasuk_id',$suratmasuk->id)->orderBy('id','desc')->limit('1')->get('status');
        return $sts;

        $hasil=StatusResources::collection($sts);

        return response([
            'data' => $hasil
        ],200);

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


    public function waiting(Request $request)
    {

        //mengubah value sent pada data suratmasuk
//        $surat = Suratmasuk::findOrFail($request->suratmasuk_id);
//        $surat->sent = 1;
//        $surat->save();

       //Cek status surat
        $sts = Status::where('suratmasuk_id',$request->suratmasuk_id)->orderBy('id','desc')->first();
//        return $sts->status;
        if ($sts->status != "Teregistrasi"){
            return "Surat Belum Teregistrasi";
        } else {
            //Mengubah status surat menjadi Menunggu Desposisi
            $newStatus = new Status();
            $newStatus->suratmasuk_id = $request->suratmasuk_id;
            $newStatus->status = "Menunggu Desposisi";
            $newStatus->user_id = '1';
            $newStatus->save();

            $sm= Suratmasuk::findOrfail($newStatus->suratmasuk_id);
            $email = new NotifikasiSekum($sm);
            Mail::to('sekum@gkj.or.id')->send($email);

            return "Surat Menunggu Desposisi";

//            return redirect('http://localhost:8001/suratmasuk/teregistrasi');
        }



    }

    public function lampiran(Suratmasuk $suratmasuk){
        try {
            return Storage::disk('local')->response($suratmasuk->file);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
