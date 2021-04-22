<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tsubbidang extends Model
{
    protected $connection = 'mysql2';
    protected  $table = 'tsubbidang';
    use HasFactory;

    public function Tbidang()
    {
        return $this->belongsTo('App\Models\Tbidang','bidang_id','id');
    }

    public function Dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }
}
