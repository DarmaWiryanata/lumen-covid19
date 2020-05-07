<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    protected $table = "sumber";

    protected $fillable = ['kasus_id', 'nama', 'url'];
}