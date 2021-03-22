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
        return $this->belongsTo(Bidang::class);
    }
}
