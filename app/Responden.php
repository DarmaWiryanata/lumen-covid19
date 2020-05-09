<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $table = "responden";

    protected $fillable = ['tahun_lahir', 'jenis_kelamin', 'pendidikan_terakhir', 'pekerjaan', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'informasi'];

    public function respons()
    {
        return $this->hasMany(Kuesioner::class);
    }

    static function firstLatestResponden()
    {
        $data = Responden::latest()->first();

        return $data;
    }
}