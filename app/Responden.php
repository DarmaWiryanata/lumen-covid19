<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Responden extends Model
{
    protected $table = "responden";

    protected $fillable = ['tahun_lahir', 'jenis_kelamin', 'pendidikan_terakhir', 'pekerjaan', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'level', 'aplikasi'];

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

    static function updateApl($id, $aplikasi)
    {
        Responden::whereId($id)->update(['aplikasi' => $aplikasi]);
    }

    static function APIgetWilayah($wilayah)
    {
        if ($wilayah['provinsi'] != NULL) {
            return Provinsi::select('nama_provinsi as daerah', 'latitude as latitude', 'longitude as longitude')
                        ->where('nama_provinsi', $wilayah['provinsi'])
                        ->first();
        }
        if ($wilayah['kabkota'] != NULL) {
            return Kabupaten::select('nama_kabkota as daerah', 'latitude as latitude', 'longitude as longitude')
                        ->where('nama_kabkota', $wilayah['kabkota'])
                        ->first();
        }
        if ($wilayah['kecamatan'] != NULL) {
            return Kecamatan::select('nama_kecamatan as daerah', 'latitude as latitude', 'longitude as longitude')
                        ->where('nama_kecamatan', $wilayah['kecamatan'])
                        ->first();
        }
    }

    static function APIgetTotal($wilayah, $status)
    {
        $provinsi = $wilayah['provinsi'];
        $kabkota = $wilayah['kabkota'];
        $kecamatan = $wilayah['kecamatan'];

        $kolom = $status['kolom'];

        $totalresponden = DB::table('responden');
                            ($kolom == 'tahun_lahir' ? $totalresponden->select('tahun_lahir')->groupBy('tahun_lahir') : ($kolom == 'jenis_kelamin' ? $totalresponden->selectRaw('(CASE jenis_kelamin WHEN 1 THEN "Laki-laki" ELSE "Perempuan" END) as jenis_kelamin')->groupBy('jenis_kelamin') : ($kolom == 'pendidikan_terakhir' ? $totalresponden->select('pendidikan_terakhir')->groupBy('pendidikan_terakhir') : ($kolom == 'pekerjaan' ? $totalresponden->join('pekerjaan', 'responden.pekerjaan', 'pekerjaan.id')->select('pekerjaan.bidang as pekerjaan')->groupBy('pekerjaan.bidang') : ''))));
                            if (!($provinsi == "" && $kabkota == "" && $kecamatan == "")) {
                                ($provinsi != "" ? $totalresponden->where('provinsi.nama_provinsi', $provinsi) : "");
                                ($kabkota != "" ? $totalresponden->where('kabkota.nama_kabkota', $kabkota) : "");
                                ($kecamatan != "" ? $totalresponden->where('kecamatan.nama_kecamatan', $kecamatan) : "");
                            }
                            $totalresponden->join('provinsi', 'responden.provinsi', 'provinsi.id');
                            ($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? $totalresponden->join('kabkota', 'responden.kabupaten','kabkota.id') : "");
                            ($kabkota != NULL || $kecamatan != NULL ? $totalresponden->join('kecamatan', 'responden.kecamatan','kecamatan.id') : "");
                            ($kecamatan != NULL ? $totalresponden->join('kelurahan', 'responden.desa','kelurahan.id') : "");
        $total = $totalresponden->get();

        foreach ($total as $key => $value) {
            $dataa = DB::table('responden');
                        ($kolom == 'tahun_lahir' ? $dataa->select('tahun_lahir')->groupBy('tahun_lahir')->where('tahun_lahir', $value->tahun_lahir) : ($kolom == 'jenis_kelamin' ? $dataa->selectRaw('(CASE jenis_kelamin WHEN 1 THEN "Laki-laki" ELSE "Perempuan" END) as jenis_kelamin')->groupBy('jenis_kelamin')->where('jenis_kelamin', ($value->jenis_kelamin == "Laki-laki" ? 1 : 2)) : ($kolom == 'pendidikan_terakhir' ? $dataa->select('pendidikan_terakhir')->groupBy('pendidikan_terakhir')->where('pendidikan_terakhir', $value->pendidikan_terakhir) : ($kolom == 'pekerjaan' ? $dataa->join('pekerjaan', 'responden.pekerjaan', 'pekerjaan.id')->select('pekerjaan.bidang as pekerjaan')->groupBy('pekerjaan.bidang')->where('pekerjaan.bidang', $value->pekerjaan) : ''))));
                        if (!($provinsi == "" && $kabkota == "" && $kecamatan == "")) {
                            ($provinsi != "" ? $dataa->where('provinsi.nama_provinsi', $provinsi) : "");
                            ($kabkota != "" ? $dataa->where('kabkota.nama_kabkota', $kabkota) : "");
                            ($kecamatan != "" ? $dataa->where('kecamatan.nama_kecamatan', $kecamatan) : "");
                        }
                        $dataa->join('provinsi', 'responden.provinsi', 'provinsi.id');
                        ($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? $dataa->join('kabkota', 'responden.kabupaten','kabkota.id') : "");
                        ($kabkota != NULL || $kecamatan != NULL ? $dataa->join('kecamatan', 'responden.kecamatan','kecamatan.id') : "");
                        ($kecamatan != NULL ? $dataa->join('kelurahan', 'responden.desa','kelurahan.id') : "");
            $abc[$key] = $dataa->first();

            $data = DB::table('responden')
                            ->selectRaw('(CASE responden.level WHEN 1 THEN "Sangat Rendah" WHEN 2 THEN "Rendah" WHEN 3 THEN "Sedang" WHEN 4 THEN "Tinggi" ELSE "Sangat Tinggi" END) as level, COUNT(responden.level) as jumlah, ROUND(AVG(aplikasi), 0) as aplikasi');
                            ($kolom == 'tahun_lahir' ? $data->where('tahun_lahir', $value->tahun_lahir) : ($kolom == 'jenis_kelamin' ? $data->where('jenis_kelamin', ($value->jenis_kelamin == "Laki-laki" ? 1 : 2)) : ($kolom == 'pendidikan_terakhir' ? $data->where('pendidikan_terakhir', $value->pendidikan_terakhir) : ($kolom == 'pekerjaan' ? $data->join('pekerjaan', 'responden.pekerjaan', 'pekerjaan.id')->where('pekerjaan.bidang', $value->pekerjaan) : ''))))
                            ->groupBy('level');
                            if (!($provinsi == "" && $kabkota == "" && $kecamatan == "")) {
                                ($provinsi != "" ? $data->where('provinsi.nama_provinsi', $provinsi) : "");
                                ($kabkota != "" ? $data->where('kabkota.nama_kabkota', $kabkota) : "");
                                ($kecamatan != "" ? $data->where('kecamatan.nama_kecamatan', $kecamatan) : "");
                            }
                            $data->join('provinsi', 'responden.provinsi', 'provinsi.id');
                            ($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? $data->join('kabkota', 'responden.kabupaten','kabkota.id') : "");
                            ($kabkota != NULL || $kecamatan != NULL ? $data->join('kecamatan', 'responden.kecamatan','kecamatan.id') : "");
                            ($kecamatan != NULL ? $data->join('kelurahan', 'responden.desa','kelurahan.id') : "");
            $abc[$key]->responden = $data->get();
        }
        
        return $abc;
    }

    static function APIgetResponden($wilayah, $status)
    {
        $provinsi = $wilayah['provinsi'];
        $kabkota = $wilayah['kabkota'];
        $kecamatan = $wilayah['kecamatan'];

        $pencarian = $status['pencarian'];
        $kolom = $status['kolom'];
        
        $hasil = app('db')->select("SELECT responden.provinsi AS kode 
                                    ".($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? ", responden.kabupaten as kode " : "")."
                                    ".($kabkota != NULL || $kecamatan != NULL ? ", responden.kecamatan as kode " : "")."
                                    ".($kecamatan != NULL ? ", responden.desa as kode " : "")."
                                    FROM responden
                                    INNER JOIN provinsi ON responden.provinsi = provinsi.id
                                    INNER JOIN kabkota ON responden.kabupaten = kabkota.id
                                    INNER JOIN kecamatan ON responden.kecamatan = kecamatan.id
                                    INNER JOIN kelurahan ON responden.desa = kelurahan.id 
                                    ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : "WHERE ")."
                                    ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "" : 
                                    ($provinsi != "" ? "provinsi.nama_provinsi = '$provinsi'" : "").($kabkota != "" && $provinsi != "" ? "AND " : "")."
                                    ".($kabkota != "" ? "kabkota.nama_kabkota = '$kabkota'" : "").(($kecamatan != "" && $provinsi != "") || ($kecamatan != "" && $kabkota != "") ? "AND " : "")."
                                    ".($kecamatan != "" ? "kecamatan.nama_kecamatan = '$kecamatan'" : ""))."
                                    GROUP BY ".($provinsi == "" && $kabkota == "" && $kecamatan == "" ? "responden.provinsi" : ""). ($kecamatan != NULL ? "responden.desa" : ($kabkota != NULL ? "responden.kecamatan" : ($provinsi != NULL ? "responden.kabupaten" : ""))));
        foreach ($hasil as $key => $value) {
            $kode = $value->kode;

            $data = DB::table('responden')->select('provinsi.nama_provinsi as provinsi', 'provinsi.latitude as provinsi_latitude', 'provinsi.longitude as provinsi_longitude');
                            ($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? $data->select('kabkota.nama_kabkota as kabkota', 'kabkota.latitude as kabkota_latitude', 'kabkota.longitude as kabkota_longitude') : "");
                            ($kabkota != NULL || $kecamatan != NULL ? $data->select('kecamatan.nama_kecamatan as kecamatan', 'kecamatan.latitude as kecamatan_latitude', 'kecamatan.longitude as kecamatan_longitude') : "");
                            ($kecamatan != NULL ? $data->select('kelurahan.nama_kelurahan as desa', 'kelurahan.latitude as desa_latitude', 'kelurahan.longitude as desa_longitude') : "");
                            $data->join('provinsi', 'responden.provinsi', 'provinsi.id');
                            ($provinsi != NULL || $kabkota != NULL || $kecamatan != NULL ? $data->join('kabkota', 'responden.kabupaten','kabkota.id') : "");
                            ($kabkota != NULL || $kecamatan != NULL ? $data->join('kecamatan', 'responden.kecamatan','kecamatan.id') : "");
                            ($kecamatan != NULL ? $data->join('kelurahan', 'responden.desa','kelurahan.id') : "");
                            if (!($provinsi == "" && $kabkota == "" && $kecamatan == "")) {
                                ($provinsi != "" ? $data->where('provinsi.nama_provinsi', $provinsi) : "");
                                ($kabkota != "" ? $data->where('kabkota.nama_kabkota', $kabkota) : "");
                                ($kecamatan != "" ? $data->where('kecamatan.nama_kecamatan', $kecamatan) : "");
                            }
                            ($provinsi != NULL ? $data->where('responden.kabupaten', $kode) : ($kabkota != NULL ? $data->where('responden.kecamatan', $kode) : ($kecamatan != NULL ? $data->where('responden.desa', $kode) : $data->where('responden.provinsi', $kode))));
                            ($provinsi != NULL ? $data->groupBy('responden.kabupaten') : ($kabkota != NULL ? $data->groupBy('responden.kecamatan') : ($kecamatan != NULL ? $data->groupBy('responden.desa') : $data->groupBy('responden.provinsi'))));
            $query[$key] = $data->first();
            
            $dataresponden = DB::table('responden');
                                ($kolom == 'tahun_lahir' ? $dataresponden->select('tahun_lahir') : ($kolom == 'jenis_kelamin' ? $dataresponden->selectRaw('(CASE jenis_kelamin WHEN 1 THEN "Laki-laki" ELSE "Perempuan" END) as jenis_kelamin') : ($kolom == 'pendidikan_terakhir' ? $dataresponden->select('pendidikan_terakhir') : ($kolom == 'pekerjaan' ? $dataresponden->join('pekerjaan', 'responden.pekerjaan', 'pekerjaan.id')->select('pekerjaan.nama as pekerjaan') : ''))));
                                $dataresponden->selectRaw('(CASE responden.level WHEN 1 THEN "Sangat Rendah" WHEN 2 THEN "Rendah" WHEN 3 THEN "Sedang" WHEN 4 THEN "Tinggi" ELSE "Sangat Tinggi" END) as level, COUNT(responden.level) as jumlah, ROUND(AVG(aplikasi), 0) as aplikasi');
                                ($kolom == 'tahun_lahir' ? $dataresponden->groupBy('tahun_lahir') : ($kolom == 'jenis_kelamin' ? $dataresponden->groupBy('jenis_kelamin') : ($kolom == 'pendidikan_terakhir' ? $dataresponden->groupBy('pendidikan_terakhir') : ($kolom == 'pekerjaan' ? $dataresponden->groupBy('pekerjaan') : ''))));
                                $dataresponden->groupBy('responden.level');
                                ($provinsi != NULL ? $dataresponden->where('responden.kabupaten', $kode) : ($kabkota != NULL ? $dataresponden->where('responden.kecamatan', $kode) : ($kecamatan != NULL ? $dataresponden->where('responden.desa', $kode) : $dataresponden->where('responden.provinsi', $kode))));
            $query[$key]->responden = $dataresponden->get();
        }
         
        return $query;
    }
}