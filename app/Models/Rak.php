<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'trak';
    use HasFactory;

    public function Box()
    {
        return $this->hasMany('App\Models\Box');
    }
}
