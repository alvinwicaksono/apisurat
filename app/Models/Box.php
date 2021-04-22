<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $connection ='mysql2';
    protected $table= 'tbox';

    public function Rak()
    {
        return $this->belongsTo('App\Models\Rak','RAK_ID','ID');
    }

    public function Dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }

}
