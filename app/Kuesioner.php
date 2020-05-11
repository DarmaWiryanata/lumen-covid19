<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    protected $table = "kuesioner";

    protected $fillable = ['kasus_id', 'pertanyaan', 'jawaban', 'kategori', 'status'];

    protected $hidden = ['status', 'created_at', 'updated_at'];

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function respons()
    {
        return $this->hasMany(Response::class);
    }

    static function firstKuesioner($id)
    {
        $data = Kuesioner::findOrFail($id);

        return $data;
    }
    
    static function getKuesionerByKasus($kasusId)
    {
        $data = Kuesioner::where('kasus_id', $kasusId)->get();

        return $data;
    }
}