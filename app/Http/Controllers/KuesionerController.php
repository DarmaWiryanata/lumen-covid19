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
        $kasus = Kasus::firstKasus($id);
        $kuesioner = Kuesioner::getKuesionerByKasus($id);

        return view('admin-kuesioner', compact('kasus', 'kuesioner'));
    }

    function edit($id)
    {
        $kuesioner = Kuesioner::firstKuesioner($id);

        $data[] = $kuesioner->toArray();

        return json_encode($data);
    }
}