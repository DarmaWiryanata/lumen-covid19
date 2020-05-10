<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    protected $table = "sumber";

    protected $fillable = ['kasus_id', 'nama', 'url'];

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    static function getSumberByKasus($kasusId)
    {
        return Sumber::where('kasus_id', $kasusId)->get();
    }
}