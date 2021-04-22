@component('mail::message')
# Surat Masuk Baru
Nomor Surat : {{$des->Suratmasuk->nomor_surat}} <br>
Nama Surat : {{$des->Suratmasuk->nama_surat}}<br>
Pengirim : {{$des->Suratmasuk->sumber_surat}}<br>
Tanggal Masuk : {{$des->Suratmasuk->tgl_masuk}}<br>

<hr>

<b>Desposisi</b> <br>
@if($des->pic)
    PIC : {{$des->pic}} <br>
@endif
Instruksi  : {{$des->instruksi}} <br>
Isi Desposisi  : {{$des->isi_desposisi}} <br>
Kecepatan : {{$des->kecepatan}} <br>
Tanggal Selesai : {{$des->tgl_selesai}}

@component('mail::button', ['url' => 'http://localhost:8000/api/lampiran/'.$des->Suratmasuk->id])
Lihat Surat
@endcomponent

Thanks,<br>
Administrasi Surat Sinode GKJ
@endcomponent
