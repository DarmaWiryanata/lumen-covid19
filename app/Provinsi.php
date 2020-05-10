<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = "provinsi";

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class);
    }

    static function firstProvinsi($id)
    {
        $data = Provinsi::findOrFail($id);

        return $data;
    }

    static function getProvinsi()
    {
        $data = Provinsi::all();

        return $data;
    }
}