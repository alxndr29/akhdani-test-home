<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perdin extends Model
{
    //
    protected $table = 'kota';
    protected $primaryKey = 'id';

    public function kota(){
        return $this->belongsTo(Kota::class);
    }
}
