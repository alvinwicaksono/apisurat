<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResources;
use App\Models\Status;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Suratmasuk()
    {
        $hasil = Suratmasuk::orderBy('id','DESC')->limit('5')->get();
        return response([
            'data'=>$hasil,
        ],200);
    }

    public function status()
    {
        $sts = Status::orderBy('id','DESC')->with('Suratmasuk','User')->limit('5')->get();

        $hasil= StatusResources::collection($sts);

        return response([
            'data' => $hasil
        ],200);
    }
}
