<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table ='penerima';
    use HasFactory;

    public function Desposisimasuk()
    {
        return $this->hasMany(Desposisimasuk::class);
    }
}
