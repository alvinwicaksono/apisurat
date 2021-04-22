<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';
    use HasFactory;

    public function Subbidang()
    {
        return $this->hasMany(Subbidang::class);
    }

    public function Suratmasuk()
    {
        return $this->hasMany(Suratmasuk::class);
    }
}
