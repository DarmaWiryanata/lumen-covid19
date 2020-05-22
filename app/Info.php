<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';

    protected $fillable = ['nama', 'status'];

    protected $hidden = ['status', 'created_at', 'updated_at'];

    static function getInfo()
    {
        return Info::all();
    }
}