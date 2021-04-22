<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tlembaga';
    use HasFactory;

    public function Klasis()
    {
        return $this->belongsTo('App\Models\Klasis','KLASIS_ID', 'ID');
    }

    public function Dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }

}
