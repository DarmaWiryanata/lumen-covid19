<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';

    protected $fillable = ['responden_id', 'sumber'];

    protected $hidden = ['created_at', 'updated_at'];

    public function responden()
    {
        return $this->belongsTo(Responden::class);
    }
}