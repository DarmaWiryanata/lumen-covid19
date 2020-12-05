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
}