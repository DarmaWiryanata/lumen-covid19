<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kasus;
use App\Kuesioner;

class KuesionerController extends Controller
{
    function index($id)
    {
        $kasus = Kasus::findOrFail($id);
        $kuesioner = Kuesioner::where('kasus_id', $id)->get();

        return view('kuesioner.index', compact('kasus', 'kuesioner'));
    }

    function edit($id)
    {
        $kuesioner = Kuesioner::firstWhere('id', $id);

        $data[] = $kuesioner->toArray();

        return json_encode($data);
    }
}