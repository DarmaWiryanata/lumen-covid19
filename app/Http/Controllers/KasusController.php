<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kasus;
use App\Kuesioner;

class KasusController extends Controller
{
    function index()
    {
        $kasus = Kasus::all();

        return view('kasus.index', compact('kasus'));
    }

    function show($id)
    {
        return redirect()->route('kuesioner.index', ['id' => $id]);
    }
}