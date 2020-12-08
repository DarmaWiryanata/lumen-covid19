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

    // static function APIgetRespondenByWilayah($wilayah)
    // {
    //     $provinsi = $wilayah['provinsi'];
    //     $kabkota = $wilayah['kabkota'];
    //     $kecamatan = $wilayah['kecamatan'];
        
    //     return app('db')->select("SELECT provinsi.nama_provinsi as provinsi, ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? "kabkota.nama_kabkota as kabkota, " : "").($kabkota != NULL || $kecamatan != NULL ? "kecamatan.nama_kecamatan as kecamatan, " : "").($kecamatan != NULL ? "kelurahan.nama_kelurahan as desa, " : "")." (CASE responden.level WHEN 1 THEN 'Sangat Rendah' WHEN 2 THEN 'Rendah' WHEN 3 THEN 'Sedang' WHEN 4 THEN 'Tinggi' ELSE 'Sangat Tinggi' END) as level, COUNT(responden.level) as jumlah FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id INNER JOIN kelurahan ON responden.desa = kelurahan.id ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE "). ($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY responden.level".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? ", responden.provinsi" : ", "). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa, responden.level");
    // }

    static function APIgetResponden($wilayah, $status)
    {
        $provinsi = $wilayah['provinsi'];
        $kabkota = $wilayah['kabkota'];
        $kecamatan = $wilayah['kecamatan'];

        $pencarian = $status['pencarian'];
        $kolom = $status['kolom'];
        
        return $data = app('db')->select("SELECT responden.provinsi AS kode 
                                    ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? ", responden.kabupaten as kode " : "")."
                                    ".($kabkota != NULL || $kecamatan != NULL ? ", responden.kecamatan as kode " : "")."
                                    ".($kecamatan != NULL ? ", responden.desa as kode " : "")."
                                    FROM responden 
                                    INNER JOIN provinsi ON responden.provinsi = provinsi.id
                                    ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? "INNER JOIN kabkota ON responden.kabupaten = kabkota.id " : "")."
                                    ".($kabkota != NULL || $kecamatan != NULL ? "INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id " : "")."
                                    ".($kecamatan != NULL ? "INNER JOIN kelurahan ON responden.desa = kelurahan.id " : "")."
                                    ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ")."
                                    ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : 
                                    ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "")."
                                    ".($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "")."
                                    ".($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))."
                                    GROUP BY ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "responden.provinsi" : ""). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))));
        foreach ($data[0] as $key => $value) {
            $query = app('db')->select('SELECT level, COUNT(id) as total
                                        FROM responden
                                        WHERE provinsi = '.$value.'
                                        GROUP BY level');
        }
        return $query;
        $abc = app('db')->select("SELECT responden.id, responden.provinsi as kode, provinsi.nama_provinsi as provinsi, provinsi.latitude, provinsi.longitude".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? ", kabkota.nama_kabkota as kabkota, CONCAT(kabkota.latitude, '/', kabkota.longitude) as koordinat_kabkota, responden.kabupaten as kode " : "").($kabkota != NULL || $kecamatan != NULL ? ", kecamatan.nama_kecamatan as kecamatan, CONCAT(kecamatan.latitude, '/', kecamatan.longitude) as koordinat_kecamatan, responden.kecamatan as kode " : "").($kecamatan != NULL ? ", kelurahan.nama_kelurahan as desa, responden.desa as kode " : "")." FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id INNER JOIN kelurahan ON responden.desa = kelurahan.id ".($kolom == "responden.pekerjaan" ? "INNER JOIN pekerjaan ON responden.pekerjaan = pekerjaan.id " : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY ".($pencarian == 1 ? "$kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "responden.provinsi" : ""). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa");
        foreach ($abc as $key => $value) {
            $kode = $value->kode;
            $data[$key] = app('db')->select("SELECT responden.id, provinsi.nama_provinsi as provinsi, provinsi.latitude as provinsi_latitude, provinsi.longitude as provinsi_longitude ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? ", kabkota.nama_kabkota as kabkota, CONCAT(kabkota.latitude, '/', kabkota.longitude) as koordinat_kabkota " : "").($kabkota != NULL || $kecamatan != NULL ? ", kecamatan.nama_kecamatan as kecamatan, CONCAT(kecamatan.latitude, '/', kecamatan.longitude) as koordinat_kecamatan " : "").($kecamatan != NULL ? ", kelurahan.nama_kelurahan as desa " : "")." FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id INNER JOIN kelurahan ON responden.desa = kelurahan.id ".($kolom == "responden.pekerjaan" ? "INNER JOIN pekerjaan ON responden.pekerjaan = pekerjaan.id " : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "responden.provinsi = '$kode'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY ".($pencarian == 1 ? "$kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "responden.provinsi" : ""). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa");
            // $data['responden'] = app('db')->select("SELECT (CASE responden.level WHEN 1 THEN 'Sangat Rendah' WHEN 2 THEN 'Rendah' WHEN 3 THEN 'Sedang' WHEN 4 THEN 'Tinggi' ELSE 'Sangat Tinggi' END) as level, COUNT(responden.level) as jumlah FROM responden ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY responden.level".($pencarian == 1 ? ", $kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? ", responden.provinsi" : ", "). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa, responden.level");
        }
        return $data;
        // $abc = app('db')->select("SELECT responden.id, responden.provinsi as kode, provinsi.nama_provinsi as provinsi, CONCAT(provinsi.latitude, '/', provinsi.longitude) as koordinat_provinsi ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? ", kabkota.nama_kabkota as kabkota, CONCAT(kabkota.latitude, '/', kabkota.longitude) as koordinat_kabkota, responden.kabupaten as kode " : "").($kabkota != NULL || $kecamatan != NULL ? ", kecamatan.nama_kecamatan as kecamatan, CONCAT(kecamatan.latitude, '/', kecamatan.longitude) as koordinat_kecamatan, responden.kecamatan as kode " : "").($kecamatan != NULL ? ", kelurahan.nama_kelurahan as desa, responden.desa as kode " : "")." FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id INNER JOIN kelurahan ON responden.desa = kelurahan.id ".($kolom == "responden.pekerjaan" ? "INNER JOIN pekerjaan ON responden.pekerjaan = pekerjaan.id " : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY ".($pencarian == 1 ? "$kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "responden.provinsi" : ""). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa");
        // foreach ($abc as $key => $value) {
        //     $kode = $value->kode;
        //     $data[$key] = app('db')->select("SELECT responden.id, provinsi.nama_provinsi as provinsi, provinsi.latitude as provinsi_latitude, provinsi.longitude as provinsi_longitude ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? ", kabkota.nama_kabkota as kabkota, CONCAT(kabkota.latitude, '/', kabkota.longitude) as koordinat_kabkota " : "").($kabkota != NULL || $kecamatan != NULL ? ", kecamatan.nama_kecamatan as kecamatan, CONCAT(kecamatan.latitude, '/', kecamatan.longitude) as koordinat_kecamatan " : "").($kecamatan != NULL ? ", kelurahan.nama_kelurahan as desa " : "")." FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id INNER JOIN kelurahan ON responden.desa = kelurahan.id ".($kolom == "responden.pekerjaan" ? "INNER JOIN pekerjaan ON responden.pekerjaan = pekerjaan.id " : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "responden.provinsi = '$kode'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY ".($pencarian == 1 ? "$kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "responden.provinsi" : ""). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa");
        //     // $data['responden'] = app('db')->select("SELECT (CASE responden.level WHEN 1 THEN 'Sangat Rendah' WHEN 2 THEN 'Rendah' WHEN 3 THEN 'Sedang' WHEN 4 THEN 'Tinggi' ELSE 'Sangat Tinggi' END) as level, COUNT(responden.level) as jumlah FROM responden ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY responden.level".($pencarian == 1 ? ", $kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? ", responden.provinsi" : ", "). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa, responden.level");
        // }
        // return $data;
                // return $data = app('db')->select("SELECT ".($pencarian == 1 ? ($kolom == "tahun_lahir" || $kolom == "pendidikan_terakhir" ? "$kolom," : ($kolom == "jenis_kelamin" ? '(CASE responden.jenis_kelamin WHEN 1 THEN "Laki-laki" ELSE "Perempuan" END) as jenis_kelamin, ' : ($kolom == "responden.pekerjaan" ? 'pekerjaan.nama as pekerjaan, ' : ''))) : "")."provinsi.nama_provinsi as provinsi, CONCAT(provinsi.latitude, '/', provinsi.longitude) as koordinat_provinsi, ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? "kabkota.nama_kabkota as kabkota, CONCAT(kabkota.latitude, '/', kabkota.longitude) as koordinat_kabkota, " : "").($kabkota != NULL || $kecamatan != NULL ? "kecamatan.nama_kecamatan as kecamatan, CONCAT(kecamatan.latitude, '/', kecamatan.longitude) as koordinat_kecamatan, " : "").($kecamatan != NULL ? "kelurahan.nama_kelurahan as desa, " : "")." (CASE responden.level WHEN 1 THEN 'Sangat Rendah' WHEN 2 THEN 'Rendah' WHEN 3 THEN 'Sedang' WHEN 4 THEN 'Tinggi' ELSE 'Sangat Tinggi' END) as level, COUNT(responden.level) as jumlah FROM responden INNER JOIN provinsi ON responden.provinsi = provinsi.id INNER JOIN kabkota ON responden.kabupaten = kabkota.id INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id INNER JOIN kelurahan ON responden.desa = kelurahan.id ".($kolom == "responden.pekerjaan" ? "INNER JOIN pekerjaan ON responden.pekerjaan = pekerjaan.id " : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "").($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "").($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))." GROUP BY responden.level".($pencarian == 1 ? ", $kolom" : "").($provinsi == "" && $kabkota == "" && $kecamatan == "" ? ", responden.provinsi" : ", "). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))). " ORDER BY responden.provinsi, responden.kabupaten, responden.kecamatan, responden.desa, responden.level");

    }
}