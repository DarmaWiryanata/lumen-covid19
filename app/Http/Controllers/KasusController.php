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
        $kasus = Kasus::getKasus();

        return view('admin-kasus', compact('kasus'));
    }

    function show($id)
    {
        return Kasus::firstKasus($id);
    }

    function store(Request $request)
    {
        Kasus::create([
                    'nama' => $request->get('nama'),
                    'slug' => $request->get('slug'),
                    'status' => $request->get('status'),
                ]);

        return redirect()->route('kasus.index');
    }

    function update(Request $request)
    {
        Kasus::whereId($request->get('id'))
                ->update([
                    'nama' => $request->get('nama'),
                    'slug' => $request->get('slug'),
                    'status' => $request->get('status'),
                ]);

        return redirect()->route('kasus.index');
    }

    function delete($id)
    {
        Kasus::whereId($id)->delete();

        return redirect()->route('kasus.index');
    }
}