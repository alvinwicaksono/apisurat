<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    use HasFactory;

    public function Desposisimasuk()
    {
        return $this->hasMany(Desposisimasuk::class);
    }

    public function Status()
    {
        return$this->hasMany('App\Models\Status');
    }

    public function Bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function Subbidang()
    {
        return $this->belongsTo('App\Models\Subbidang','subBidang_id','id');
    }
}
