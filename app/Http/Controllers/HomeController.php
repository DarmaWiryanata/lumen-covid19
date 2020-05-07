<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kasus;

class HomeController extends Controller
{
    function index()
    {
        $kasus = Kasus::all();

        return view('index', compact('kasus'));
    }

    function show($id)
    {
        $kasus = Kasus::findOrFail($id);

        return view('index');
    }
}