<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tformat';
    use HasFactory;

    public function Dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }

}
