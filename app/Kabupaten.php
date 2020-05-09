<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = "kabkota";

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}