<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Provinsi extends Model
{
    //
    protected $table = "provinsi";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function pulau()
    {
        return $this->belongsTo(Pulau::class, 'id_pulau')->withTrashed();
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class)->withTrashed();
    }
}
