<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    //
    protected $table = "kota";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi')->withTrashed();
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
