<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = "kelurahan";

    public function kodepos()
    {
        return $this->hasOne(KodePos::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    static function firstDesa($id)
    {
        $data = Desa::findOrFail($id);

        return $data;
    }

    static function getDesaByKecamatan($kecamatanId)
    {
        $data = Desa::where('kecamatan_id', $kecamatanId)->get();

        return $data;
    }
}