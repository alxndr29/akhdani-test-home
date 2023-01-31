<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pulau extends Model
{
    //
    protected $table = "pulau";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function provinsi()
    {
        return $this->hasMany(Provinsi::class)->withTrashed();
    }
}
