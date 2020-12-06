<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $table = "responden";

    protected $fillable = ['tahun_lahir', 'jenis_kelamin', 'pendidikan_terakhir', 'pekerjaan', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'level'];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class);
    }
    
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
    
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kuesioner()
    {
        return $this->hasMany(Kuesioner::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    static function firstResponden($id)
    {
        return Responden::select('id', 'tahun_lahir', 'jenis_kelamin', 'pendidikan_terakhir', 'pekerjaan', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'level', 'created_at')
                        ->whereId($id)
                        ->first();
    }

    static function firstLatestResponden()
    {
        return Responden::latest()->first();
    }

    static function getResponden()
    {
        $responden = Responden::select('id')->get();

        if ($responden->isNotEmpty()) {
            foreach ($responden as $key => $value) {
                $data[$key] = Responden::firstResponden($value->id);
                $data[$key]['nilai'] = Respons::sumGrade($value->id);
                $data[$key]['respons'] = Respons::getRespons($value->id);
            }

            return $data;
        }
    }

    static function getRespondenIdNilai()
    {
        $responden = Responden::select('id')
                    ->whereNull('level')
                    ->get();

        if ($responden->isNotEmpty()) {
            foreach ($responden as $key => $value) {
                $data[$key] = Responden::select('id')->whereId($value->id)->first();
                $data[$key]['nilai'] = Respons::sumGrade($value->id);
            }

            return $data;
        }

        return $responden;
    }

    static function updateEd($id, $level)
    {
        Responden::whereId($id)->update(['level' => $level]);
    }

    static function APIgetRespondenByWilayah($provinsi, $kabkota, $kecamatan)
    {
        return app('db')->select("SELECT provinsi.nama_provinsi as provinsi, kabkota.nama_kabkota as kabkota, kecamatan.nama_kecamatan as kecamatan, (CASE responden.level WHEN 1 THEN 'Sangat Rendah' WHEN 2 THEN 'Rendah' WHEN 3 THEN 'Sedang' WHEN 4 THEN 'Tinggi' ELSE 'Sangat Tinggi' END) as level, COUNT(responden.level) as jumlah FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE "). ($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY responden.level".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? ", responden.provinsi" : ", "). ($kecamatan != NULL ? "responden.kecamatan" : ($kabkota != NULL ? "responden.kabupaten" : ($provinsi != NULL ? "responden.provinsi" : ""))). " ORDER BY responden.provinsi, responden.level");
    }
}