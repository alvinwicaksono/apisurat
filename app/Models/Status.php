<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';


    use HasFactory;

    public function Suratmasuk()
    {
        return $this->belongsTo('App\Models\Suratmasuk','suratmasuk_id','id');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Desposisimasuk(){
        return $this->belongsTo('App\Models\Desposisimasuk','desposisimasuk_id','id');
    }
}
