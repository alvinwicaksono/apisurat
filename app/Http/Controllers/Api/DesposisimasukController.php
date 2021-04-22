<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\KirimSurat;
use App\Models\Box;
use App\Models\Desposisimasuk;
use App\Models\Dokumen;
use App\Models\Format;
use App\Models\Lembaga;
use App\Models\Penerima;
use App\Models\Status;
use App\Models\Suratmasuk;
use App\Models\Tsubbidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


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
    public function desposisi(Request $request)
    {
        $sts = Status::where('suratmasuk_id',$request->suratmasuk_id)->orderBy('id','desc')->first();
        if ($sts->status != "Menunggu Desposisi"){
            return "Surat belum Dikirim";
        }else{
            $request->validate([
                'suratmasuk_id' => 'required',
                'penerima_id' => 'required',
                'instruksi' => 'required',
                'isi_desposisi' => 'required',
                'kecepatan' => 'required',
                'tgl_selesai' => 'required',
            ]);

            $arsip = $request->arsip;
            //Mengisi Desposisi Surat Masuk
            $newDesposisi = new Desposisimasuk();
            $newDesposisi->suratmasuk_id = $request->suratmasuk_id;
            $newDesposisi->penerima_id = $request->penerima_id;
            $newDesposisi->pic = $request->pic;
            $newDesposisi->instruksi = $request->instruksi;
            $newDesposisi->isi_desposisi = $request->isi_desposisi;
            $newDesposisi->kecepatan = $request->kecepatan;
            $newDesposisi->tgl_selesai = $request->tgl_selesai;
            $newDesposisi->arsip = $request->arsip;

            $newDesposisi->save();

            //Kirim Email
            $penerima = Penerima::where('id',$newDesposisi->penerima_id)->get('email');
            $nodes=  Desposisimasuk::max('id');
            $des = Desposisimasuk::findOrfail($nodes);
            $email = new KirimSurat($des);
            Mail::to($penerima)->cc('admin@mail.com')->send($email);


            //Memberi Status surat
            $newStatus = new Status();
            $newStatus->suratmasuk_id = $request->suratmasuk_id;
            $newStatus->desposisimasuk_id= Desposisimasuk::max('id');
            $newStatus->status = "Terdesposisi";
            $newStatus->user_id = '2';
            $newStatus->save();



            //cek arsip
            if($arsip==1){
                $newStatus1 = new Status();
                $newStatus1->suratmasuk_id = $request->suratmasuk_id;
                $newStatus1->desposisimasuk_id= $newStatus->desposisimasuk_id;
                $newStatus1->status = "Menunggu Arsip";
                $newStatus1->user_id = '2';
                $newStatus1->save();
                return "Surat Menunggu Arsip";
            }

            return "Surat Terdesposisi";

//        return redirect()->back();
     }


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

    public function arsip(Request $request){

//        Cek Status
        $sts = Status::where('suratmasuk_id',$request->suratmasuk_id)->orderBy('id','desc')->first();
        if ($sts->status != "Menunggu Arsip"){
            return "Surat belum Terdesposisi \n Status Surat: ".$sts->status;
        }else{
            $y1 = date('Y',strtotime(now()));
//        return $y1;

            $suratmasuk = Suratmasuk::where('id',$request->suratmasuk_id)->first();
            $lembaga = Lembaga::where('NamaLembaga',$request->lembaga)->first();
            $box = Box::where('NamaBox',$request->box)->first();
            $Tsubbidang = Tsubbidang::where('nama_subBidang',$request->subbidang)->first();
            $formats = Format::where('NamaFormat',$request->formats)->first();

            $newArsip = new Dokumen();
            $newArsip->BatasAkses = $request->batas_akses;
            $newArsip->NamaDokumen = $suratmasuk->nama_surat;
            $newArsip->KodeDokumen = $request->kode_dokumen;
            $newArsip->Keterangan = $request->keterangan;
            $newArsip->TglBuat = $suratmasuk->tgl_dokumen;
            $newArsip->Pengarang = $suratmasuk->sumber_surat;
            $newArsip->jumdok = $request->jumdok;
            $newArsip->TglMasuk = now();
            $newArsip->LEMBAGA_ID = $lembaga->ID;
            $newArsip->BOX_ID = $box->ID;
            $newArsip->SUBBIDANG_ID = $Tsubbidang->id;
            $newArsip->FORMAT_ID = $formats->ID;
            $file_arsip = 'Arsip/'.$y1.'/'.$request->kode_dokumen;
            Storage::copy($suratmasuk->file,$file_arsip);
            $newArsip->file = $file_arsip;
            $newArsip->save();


//        return $newArsip;
            $desposisi = Desposisimasuk::where('suratmasuk_id',$request->suratmasuk_id)->first();
            $newStatus1 = new Status();
            $newStatus1->suratmasuk_id = $request->suratmasuk_id;
            $newStatus1->desposisimasuk_id= $desposisi->id;
            $newStatus1->status = "Diarsipkan";
            $newStatus1->user_id = '1';
            $newStatus1->save();

//        return $newStatus1;
            return "Surat berhasil Diarsipkan";
//            return redirect('http://localhost:8001/suratmasuk/arsipwait');
        }



    }

    public function selesai(Request $request)
    {
        //Cek Status
        $sts = Status::where('suratmasuk_id',$request->suratmasuk_id)->orderBy('id','desc')->first();
        if ($sts->status == "Terdesposisi" or $sts->status == "Diarsipkan"){
            //Mengambil Desposisi Id
            $desposisi = Desposisimasuk::where('suratmasuk_id',$request->suratmasuk_id)->first();

            //Mengubah status surat menjadi Selesai
            $newStatus = new Status();
            $newStatus->suratmasuk_id = $request->suratmasuk_id;
            $newStatus->desposisimasuk_id= $desposisi->id;
            $newStatus->status = "Selesai";
            $newStatus->user_id = '1';
            $newStatus->save();
            return "Surat Berhasil diselesaikan";
//            return redirect('http://localhost:8001/suratmasuk/selesai');
        }else{
            return "Status Surat ".$sts->status;
        }



    }
}
