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

    function show($id)
    {
        $kuesioner = Kuesioner::firstKuesioner($id);

        $data[] = $kuesioner->toArray();

        return json_encode($data);
    }

    function store(Request $request)
    {
        Kuesioner::create([
                    'kasus_id' => $request->get('kasus_id'),
                    'pertanyaan' => $request->get('pertanyaan'),
                    'jawaban' => $request->get('jawaban') == null ? null : $request->get('jawaban'),
                    'kategori' => $request->get('kategori'),
                    'status' => $request->get('status')
                ]);

        return redirect()->route('kuesioner.index', ['id' => $request->get('kasus_id')]);
    }

    function update(Request $request)
    {
        Kuesioner::whereId($request->get('id'))
                    ->update([
                        'kasus_id' => $request->get('kasus_id'),
                        'pertanyaan' => $request->get('pertanyaan'),
                        'jawaban' => $request->get('jawaban') == null ? null : $request->get('jawaban'),
                        'kategori' => $request->get('kategori'),
                        'status' => $request->get('status')
                    ]);
        
        return redirect()->back();
    }

    function delete(Request $request, $id)
    {
        Kuesioner::whereId($id)->delete();

        return redirect()->route('kuesioner.index', ['id' => $request->get('kasus_id')]);
    }
}