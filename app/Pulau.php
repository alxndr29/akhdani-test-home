<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulau extends Model
{
    //
    protected $table = "pulau";
    public function provinsi()
    {
        return $this->hasMany(Provinsi::class);
    }
}
