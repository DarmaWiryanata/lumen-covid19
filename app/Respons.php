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
}