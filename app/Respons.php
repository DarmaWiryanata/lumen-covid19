<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respons extends Model
{
    protected $table = "respons";

    protected $fillable = ['responden_id', 'kasus_id', 'kuesioner_id', 'jawaban', 'kategori'];
    
    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function kuesioner()
    {
        return $this->belongsTo(Kuesioner::class);
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class);
    }

    static function maxGrade()
    {
        $grades = Respons::sumGrades();
        $data = max($grades);

        return $data;
    }

    static function minGrade()
    {
        $grades = Respons::sumGrades();
        $data = min($grades);

        return $data;
    }

    static function sumGrade($id)
    {
        $data = Respons::selectRaw('sum(jawaban) * 100 / 20 as nilai')
                        ->where('responden_id', $id)
                        ->whereBetween('kuesioner_id', [1, 20])
                        ->groupBy('responden_id')
                        ->pluck('nilai')
                        ->first();
        
        $data = json_encode($data, JSON_NUMERIC_CHECK);
        $data = json_decode($data);

        return $data;
    }

    static function sumGrades()
    {
        $data = Respons::selectRaw('sum(jawaban) * 100 / 20 as nilai')
                        ->whereBetween('kuesioner_id', [1, 20])
                        ->groupBy('responden_id')
                        ->take(397)
                        ->pluck('nilai');
        
        $data = json_encode($data, JSON_NUMERIC_CHECK);
        $data = json_decode($data);

        return $data;
    }

    static function getAplikasiGrades()
    {
        $nilai = Respons::select('responden_id')
                        ->groupBy('responden_id')
                        ->take(397)
                        ->get();

        if ($nilai->isNotEmpty()) {
            foreach ($nilai as $key => $value) {
                $data[$key]['responden_id'] = $value->responden_id;
                $data[$key]['jumlah'] = 0;
                $data[$key]['nilai'] = Respons::select('jawaban')
                                                ->where('responden_id', $value->responden_id)
                                                ->whereBetween('kuesioner_id', [21, 30])
                                                ->get();
            }

            return $data;
        }
        
        return $nilai;
    }

    static function getRespons($id)
    {
        return Respons::select('id', 'kuesioner_id', 'jawaban', 'kategori')
                        ->where('responden_id', $id)
                        ->whereBetween('kuesioner_id', [1, 20])
                        ->get();
    }
}