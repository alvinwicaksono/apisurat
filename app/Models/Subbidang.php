<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbidang extends Model
{
    protected $table = 'subbidang';
    use HasFactory;

    public function Bidang()
    {
        return $this->belongsTo('App\Models\Bidang','bidang_id','id');
    }

    public function Suratmasuk()
    {
        return $this->hasMany(Suratmasuk::class);
    }
}
