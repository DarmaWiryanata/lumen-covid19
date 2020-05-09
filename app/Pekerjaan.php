<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

    protected $fillable = ['nama', 'bidang'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    static function getPekerjaan()
    {
        $data = Pekerjaan::orderBy('nama')->get();

        return $data;
    }
}