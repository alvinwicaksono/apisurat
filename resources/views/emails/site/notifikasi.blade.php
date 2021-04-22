@component('mail::message')
# Surat Masuk Menunggu Desposisi

Nomor Surat : {{$sm->nomor_surat}} <br>
Nama Surat : {{$sm->nama_surat}}<br>
Pengirim : {{$sm->sumber_surat}}<br>
Tanggal Masuk : {{$sm->tgl_masuk}}<br>

@component('mail::button', ['url' => 'http://localhost:8001/sekum/desposisi'])
Lihat Disini
@endcomponent

Thanks,<br>
Administrasi Surat Sinode GKJ
@endcomponent
