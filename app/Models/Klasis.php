<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasis extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tklasis';
    use HasFactory;

    public function Lembaga()
    {
        return $this->hasMany('App\Models\Lembaga');
    }
}
