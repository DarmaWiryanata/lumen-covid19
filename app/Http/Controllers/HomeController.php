<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Desa;
use App\Kabupaten;
use App\Kasus;
use App\Kecamatan;
use App\KodePos;
use App\Kuesioner;
use App\Pekerjaan;
use App\Provinsi;
use App\Responden;
use App\Respons;

class HomeController extends Controller
{
    function index()
    {
        $kasus = Kasus::firstActiveKasus();
        $kuesioner = Kuesioner::getKuesionerByKasus($kasus->id);
        $pekerjaan = Pekerjaan::getPekerjaan();
        $provinsi = Provinsi::getProvinsi();

        return view('kuesioner', compact('kasus', 'kuesioner', 'pekerjaan', 'provinsi'));
    }

    function store(Request $request, Respons $respons)
    {
        Responden::create([
            'pendidikan_terakhir' => $request->get('pendidikan_terakhir'),
            'pekerjaan' => $request->get('pekerjaan'),
            'provinsi' => $request->get('provinsi'),
            'kabupaten' => $request->get('kabupaten'),
            'kecamatan' => $request->get('kecamatan'),
            'desa' => $request->get('desa'),
            'tahun_lahir' => $request->get('tahun_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'informasi' => "banyak",
        ]);

        $responden = Responden::firstLatestResponden();

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

        echo "Sukses joss";
    }

    function getKabupatenByProvinsi($provinsiId)
    {
        json_encode(Kabupaten::getKabupatenByProvinsi($provinsiId));
    }

    function getKecamatanByKabupaten($kabupatenId)
    {
        json_encode(Kecamatan::getKecamatanByKabupaten($kabupatenId));
    }

    function getDesaByKecamatan($kecamatanId)
    {
        json_encode(Desa::getDesaByKecamatan($kecamatanId));
    }

    function getKodePosByDesa($desaId)
    {
        json_encode(KodePos::getKodePosByDesa($desaId));
    }
}