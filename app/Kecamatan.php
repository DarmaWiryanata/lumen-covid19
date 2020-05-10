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

    public function responden()
    {
        return $this->hasMany(Responden::class);
    }

    static function firstKecamatan($id)
    {
        $data = Kecamatan::findOrFail($id);

        return $data;
    }

    static function getKecamatanByKabupaten($kabupatenId)
    {
        $data = Kecamatan::where('kabkota_id', $kabupatenId)->get();

        return $data;
    }
}