<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = "kecamatan";

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}