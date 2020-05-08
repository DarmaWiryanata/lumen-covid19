<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    protected $table = "kasus";

    protected $fillable = ['nama', 'status'];

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
}