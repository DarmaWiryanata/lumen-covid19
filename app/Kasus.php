<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    protected $table = 'kasus';

    protected $fillable = ['nama', 'status'];

    protected $hidden = ['status', 'created_at', 'updated_at'];

    public function kuesioner()
    {
        return $this->hasMany(Kuesioner::class);
    }

    public function respons()
    {
        return $this->hasMany(Respons::class);
    }

    public function sumber()
    {
        return $this->hasMany(Sumber::class);
    }

    static function firstKasus($id)
    {
        $data = Kasus::findOrFail($id);

        return $data;
    }

    static function firstActiveKasus()
    {
        $data = Kasus::firstWhere('status', 1);

        return $data;
    }

    static function getKasus()
    {
        $data = Kasus::all();

        return $data;
    }
}