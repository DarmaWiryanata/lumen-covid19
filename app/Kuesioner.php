<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    protected $table = "kuesioner";

    protected $fillable = ['kasus_id', 'pertanyaan', 'jawaban', 'kategori', 'status'];

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function respons()
    {
        return $this->hasMany(Response::class);
    }
}