<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    protected $table = "provinsi";
    
    public function pulau()
    {
        return $this->belongsTo(Pulau::class, 'id_pulau');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
