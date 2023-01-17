<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'kota';
    protected $primaryKey = 'id';

    public function perdin(){
        return $this->hasMany(Perdin::class);
    }
}
