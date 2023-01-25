<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    protected $table = "kota";
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }
    public function perdin_kota_asal()
    {
        return $this->hasMany(Perdin::class,'kota_asal');
    }
    public function perdin_kota_tujuan()
    {
        return $this->hasMany(Perdin::class, 'kota_tujuan');
    }
}
