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


//Bidang
Route::get('bidang', [BidangController::class,'index'])->name('bidang.index');
Route::post('bidang', [BidangController::class, 'store'])->name('bidang.store');

//SubBidang
Route::get('subbidang', [SubBidangController::class,'index'])->name('subbidang.index');
Route::post('subbidang', [SubBidangController::class, 'store'])->name('subbidang.store');

