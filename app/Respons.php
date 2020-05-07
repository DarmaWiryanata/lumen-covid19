<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respons extends Model
{
    protected $table = "respons";

    protected $fillable = ['responden_id', 'kasus_id', 'kuesioner_id', 'jawaban', 'kategori'];
}