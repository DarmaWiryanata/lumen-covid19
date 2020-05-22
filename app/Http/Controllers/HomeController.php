<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Desa;
use App\Info;
use App\Informasi;
use App\Kabupaten;
use App\Kasus;
use App\Kecamatan;
use App\KodePos;
use App\Kuesioner;
use App\Pekerjaan;
use App\Provinsi;
use App\Responden;
use App\Respons;
use App\Sumber;

class HomeController extends Controller
{
    function index()
    {
        $info = Info::getInfo()->where('status', 1);
        $kasus = Kasus::firstActiveKasus();
        $kuesioner = Kuesioner::getKuesionerByKasus($kasus->id)->where('status', 1);
        $pekerjaan = Pekerjaan::getPekerjaan();
        $provinsi = Provinsi::getProvinsi();

        return view('kuesioner', compact('info', 'kasus', 'kuesioner', 'pekerjaan', 'provinsi'));
    }

    function store(Request $request, Respons $respons)
    {
        // Responden
        Responden::create([
            'pendidikan_terakhir' => $request->get('pendidikan_terakhir'),
            'pekerjaan' => $request->get('pekerjaan'),
            'provinsi' => $request->get('provinsi'),
            'kabupaten' => $request->get('kabupaten'),
            'kecamatan' => $request->get('kecamatan'),
            'desa' => $request->get('desa'),
            'tahun_lahir' => $request->get('tahun_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
        ]);

        // Get responden id
        $responden = Responden::firstLatestResponden();

        // Respons
        foreach ($request->respons as $key => $item) {
            $kuesioner = Kuesioner::findOrFail($item['kuesioner_id']);
            if ($kuesioner->kategori == 1) {
                if ((int)$item['jawaban'] == $kuesioner->jawaban) {
                    $jawaban = 1;
                } else {
                    $jawaban = 0;
                }
            } else {
                $jawaban = $item['jawaban'];
            }

            Respons::create([
                'responden_id' => $responden->id,
                'kasus_id' => '1',
                'kuesioner_id' => $item['kuesioner_id'],
                'jawaban' => $jawaban,
                'kategori' => $item['kategori']
            ]);
        }

        // Informasi
        foreach ($request->informasi as $key => $value) {
            Informasi::create([
                'responden_id' => $responden->id,
                'sumber' => $value['sumber']
            ]);
        }
        
        return redirect()->route('trims');
    }

    function trims()
    {
        $kasus = Kasus::firstActiveKasus();
        $sumber = Sumber::getSumberByKasus($kasus->id);

        return view('thank', compact('sumber'));
    }

    function getKabupatenByProvinsi($id)
    {
        return json_encode(Kabupaten::getKabupatenByProvinsi($id));
    }

    function getKecamatanByKabupaten($id)
    {
        return json_encode(Kecamatan::getKecamatanByKabupaten($id));
    }

    function getDesaByKecamatan($id)
    {
        return json_encode(Desa::getDesaByKecamatan($id));
    }

    function getKodePosByDesa($id)
    {
        return json_encode(KodePos::getKodePosByDesa($id));
    }
}