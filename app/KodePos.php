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

    static function firstKodePos($id)
    {
        $data = KodePos::findOrFail($id);

        return $data;
    }

    static function firstKodePosByDesa($desaId)
    {
        $data = KodePos::firstWhere('kelurahan_id', $desaId);

        return $data;
    }
}