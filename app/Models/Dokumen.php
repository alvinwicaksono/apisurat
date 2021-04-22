<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tdokumen';
    use HasFactory;

    public function Box()
    {
        return $this->belongsTo('App\Models\Box','BOX_ID','ID');
    }

    public function Format()
    {
        return $this->belongsTo('App\Models\Format','FORMAT_ID','ID');
    }

    public function Lembaga()
    {
        return $this->belongsTo('App\Models\Lembaga','LEMBAGA_ID','ID');
    }

    public function Tsubbidang()
    {
        return $this->belongsTo('App\Models\Tsubbidang','SUBBIDANG_ID','id');
    }


}
