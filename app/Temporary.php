<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    protected $table = "temporaries";

    protected $fillable = ['value', 'nilai', 'status', 'ed'];

    public $timestamps = false;

    static function getData($k)
    {
        return Temporary::orderBy('ed')
                    ->limit($k)
                    ->get();
    }

    static function storeData($request)
    {
        foreach ($request as $key => $value) {
            Temporary::create([
                'value'     => $value->value,
                'nilai'     => $value->nilai,
                'status'    => $value->status,
                'ed'        => $value->ed,
            ]);
        }
    }

    static function truncateTable()
    {
        Temporary::truncate();
    }
}