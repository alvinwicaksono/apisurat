<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbidang extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbidang';
    use HasFactory;

    public function Tsubbidang()
    {
        return $this->hasMany('App\Models\Tsubbidang');
    }
}
