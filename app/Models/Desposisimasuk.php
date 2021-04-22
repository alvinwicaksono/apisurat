<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desposisimasuk extends Model
{
    protected $table = 'desposisimasuk';
    use HasFactory;

    public function Suratmasuk()
    {
        return $this->belongsTo(Suratmasuk::class);
    }

    public function Penerima()
    {
        return $this->belongsTo(Penerima::class);
    }

    public function Status()
    {
        return $this->hasMany('App\Models\Status');
    }
}
