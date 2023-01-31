<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perdin extends Model
{
    //
    protected $table = "perdin";
    public function kota_perdin_asal()
    {
        return $this->belongsTo(Kota::class,'kota_asal')->withTrashed();
    }
    public function kota_perdin_tujuan()
    {
        return $this->belongsTo(Kota::class,'kota_tujuan')->withTrashed();
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user')->withTrashed();
    }
}
