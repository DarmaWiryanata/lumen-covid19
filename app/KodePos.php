<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodePos extends Model
{
    protected $table = "kodepos";

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}