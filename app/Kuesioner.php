<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    protected $table = "kuesioner";

    protected $fillable = ['pertanyaan', 'jawaban', 'kategori', 'status'];
}