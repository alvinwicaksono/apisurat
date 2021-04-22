<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BidangController;
use App\Http\Controllers\Api\SubBidangController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users', [UserController::class,'index'])->name('users.index');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}', 'Api\UserController@show')->name('users.show');
Route::put('users/{user}', 'Api\UserController@update')->name('users.update');
Route::delete('users/{user}', 'Api\UserController@destroy')->name('users.destroy');

//Dashboard
Route::get('sm', [\App\Http\Controllers\Api\DashboardController::class,'Suratmasuk'])->name('sm-list');
Route::get('sts', [\App\Http\Controllers\Api\DashboardController::class,'status'])->name('sts-list');




//Bidang
Route::get('bidang', [BidangController::class,'index'])->name('bidang.index');
Route::post('bidang', [BidangController::class, 'store'])->name('bidang.store');

//SubBidang
Route::get('subbidang', [SubBidangController::class,'index'])->name('subbidang.index');
Route::post('subbidang', [SubBidangController::class, 'store'])->name('subbidang.store');

//Penerima
Route::get('penerima', [\App\Http\Controllers\Api\PenerimaController::class,'index'])->name('penerima.index');

//surat masuk
Route::post('registrasi',[\App\Http\Controllers\Api\SuratmasukController::class,'register'])->name('register');
Route::post('waiting',[\App\Http\Controllers\Api\SuratmasukController::class,'waiting'])->name('waiting');
Route::post('desposisi',[\App\Http\Controllers\Api\DesposisimasukController::class,'desposisi'])->name('desposisi');
Route::post('arsip',[\App\Http\Controllers\Api\DesposisimasukController::class,'arsip'])->name('arsip');
Route::post('selesai',[\App\Http\Controllers\Api\DesposisimasukController::class,'selesai'])->name('selesai');
Route::get('suratmasuk/{suratmasuk}',[\App\Http\Controllers\Api\SuratmasukController::class,'show'])->name('sm-show');

//status
Route::get('status/{status}',[\App\Http\Controllers\Api\StatusController::class,'index'])->name('status');
Route::get('desposisi/{status}',[\App\Http\Controllers\Api\StatusController::class,'desposisi'])->name('desposisi');
Route::get('desposisi',[\App\Http\Controllers\Api\StatusController::class,'terdesposisi'])->name('terdesposisi');
Route::get('tracking/{id}',[\App\Http\Controllers\Api\StatusController::class,'tracking'])->name('sm-track');


//lampiran surat
Route::get('lampiran/{suratmasuk}',[\App\Http\Controllers\Api\SuratmasukController::class,'lampiran'])->name('lampiran');
Route::get('lampiran/arsip/{dokumen}',[\App\Http\Controllers\Arsip\DokumenController::class,'lampiran'])->name('lampiran');



//Route Api Surat

//box
Route::get('box',[\App\Http\Controllers\Arsip\BoxController::class,'index'])->name('box');

//lembaga
Route::get('lembaga',[\App\Http\Controllers\Arsip\LembagaController::class,'index'])->name('lembaga');

//Tsubbidang
Route::get('Tsubbidang',[\App\Http\Controllers\Arsip\TsubbidangController::class,'index'])->name('Tsubbidang');

//Format
Route::get('format',[\App\Http\Controllers\Arsip\FormatController::class,'index'])->name('format');

//Dokumen
Route::get('dokumen',[\App\Http\Controllers\Arsip\DokumenController::class,'index'])->name('arsip');
