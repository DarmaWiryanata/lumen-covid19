<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Responden;
use App\Respons;
use App\Temporary;

class HomeController extends Controller
{
    public function index()
    {
        return $this->knn();
        return Responden::getResponden();
    }

    public function classification()
    {
        $grades = Respons::sumGrades();
        $min = Respons::minGrade();
        $max = Respons::maxGrade();

        // Range
        $range = 86;
        // $range = $max - $min;

        // Mean
        $mean = 50;
        // $mean = ($max - $min) / 2;

        // Deviation standard
        $ds = 10;
        // $ds = $range / 6;

        // return $mean + 1.5 * $ds;
        $output = [];
        foreach ($grades as $key => $value) {
            if ($value > $mean + 1.5 * $ds) {
                $nilai = 5;
                $status = 'Sangat Tinggi';
            } else if ($value > $mean + 0.5 * $ds) {
                $nilai = 4;
                $status = 'Tinggi';
            } else if ($value > $mean - 0.5 * $ds) {
                $nilai = 3;
                $status = 'Sedang';
            } else if ($value > $mean - 1.5 * $ds) {
                $nilai = 2;
                $status = 'Rendah';
            } else {
                $nilai = 1;
                $status = 'Sangat Rendah';
            }
            
            // $output[] = $status;
            $output = json_encode($output, JSON_NUMERIC_CHECK);
            $output = json_decode($output);
            $output[] = ['value' => $value, 'nilai' => $nilai, 'status' => $status];
        }

        return $output;
    }

    public function classification1()
    {
        $grades = Respons::sumGrades();
        $min = Respons::minGrade();
        $max = Respons::maxGrade();

        // STEP 1
        // Interval
        $interval = 1 + 3.3 * log10(count($grades));
        $interval = (int)$interval;
        
        // Range
        $range = $max - $min + 1;

        // Data length
        $length = $range / $interval;
        $length = (int)$length + 1;

        // STEP 2
        // Table
        $class = [];
        for ($i=0; $i < $interval; $i++) { 
            $jumlah = 0;
            $interval1 = $min;
            $interval2 = $min + $length - 1;

            foreach ($grades as $key => $value) {
                if ($value >= $interval1 && $value <= $interval2) {
                    $jumlah++;
                }
            }

            $percent = $jumlah / count($grades);

            $class[] = ['index' => $i, 'interval_1' => $min, 'interval_2' => $min + $length - 1, 'jumlah' => $jumlah, 'persentase' => $percent];
            $min += $length;
        }
        // return $class;

        // STEP 3
        // Max & min array
        $max = ['jumlah' => PHP_INT_MIN];
        $min = ['jumlah' => PHP_INT_MAX];
        foreach ($class as $key => $value) {
            $max = ($value['jumlah'] > $max['jumlah']) ? $value : $max ;
            $min = ($value['jumlah'] < $min['jumlah']) ? $value : $min ;
        }

        // Median value
        $maxMedian = ($max['interval_1'] + $max['interval_2']) / 2;
        $minMedian = ($min['interval_1'] + $min['interval_2']) / 2;

        // Mean ideal
        $mean = ($maxMedian + $minMedian) / 2;

        // Deviation standard
        $ds = ($maxMedian - $minMedian) / 6;

        // return $mean + 1.5 * $ds;
        $output = [];
        foreach ($grades as $key => $value) {
            if ($value > $mean + 2 * $ds) {
                $nilai = 5;
                $status = 'Sangat Tinggi';
            } else if ($value > $mean + $ds) {
                $nilai = 4;
                $status = 'Tinggi';
            } else if ($value > $mean - $ds) {
                $nilai = 3;
                $status = 'Sedang';
            } else if ($value > $mean - 2 * $ds) {
                $nilai = 2;
                $status = 'Rendah';
            } else {
                $nilai = 1;
                $status = 'Sangat Rendah';
            }
            
            $output = json_encode($output, JSON_NUMERIC_CHECK);
            $output = json_decode($output);
            $output[] = ['value' => $value, 'nilai' => $nilai, 'status' => $status, 'ed' => null];
        }

        return $output;
    }

    public function knn()
    {
        $responses = Responden::getRespondenIdNilai();
        $sample = $this->classification1();

        $k = 9;
        $i = 0;
        $data = [];

        foreach ($sample as $key => $value) {
            $data[] = $value;
            $i++;
            if ($i == 100) {
            break;
            }
        }

        foreach ($responses as $key => $response) {
            Temporary::truncateTable();
            // Euclidean distance
            foreach ($data as $key => $value) {
                $value->ed = sqrt(pow($value->value - $response->nilai, 2));
            }

            Temporary::storeData($data);
            $temporary = Temporary::getData(9);

            $status = ['sr' => 0, 'r' => 0, 's' => 0, 't' => 0, 'st' => 0];
            foreach ($temporary as $key => $value) {
                if ($value->status == 'Sangat Rendah') {
                    $status['sr']++;
                } else if ($value->status == 'Rendah') {
                    $status['r']++;
                } else if ($value->status == 'Sedang') {
                    $status['s']++;
                } else if ($value->status == 'Tinggi') {
                    $status['t']++;
                } else if ($value->status == 'Sangat Tinggi') {
                    $status['st']++;
                }
            }
            arsort($status);
            // return array_keys($status)[0];

            switch (array_keys($status)[0]) {
                case 'sr':
                    $value = 1;
                    break;
                
                case 'r':
                    $value = 2;
                    break;
                
                case 's':
                    $value = 3;
                    break;
                
                case 't':
                    $value = 4;
                    break;
                
                case 'st':
                    $value = 5;
                    break;
                
                default:
                    $value = 0;
                    break;
            }

            Responden::updateEd($response->id, $value);
        }

        return 'suksess';
    }

    static function failedRequest($id)
    {
        $data['status'] = "Gagal";
        if ($id == 1) {
            $data['message'] = "Variabel tidak boleh kosong";
        } else if ($id == 2) {
            $data['message'] = "Data tidak ditemukan";
        } else if ($id == 3) {
            $data['message'] = "Variabel data kosong";
        } else if ($id == 4) {
            $data['message'] = "Variabel data hanya bisa diisi dengan 1 (Laki-laki) dan 2 (Perempuan)";
        } else if ($id == 5) {
            $data['message'] = "Variabel data pekerjaan tidak terdaftar, silahkan cek data pekerjaan pada halaman dokumentasi";
        }

        return $data;
    }

    static function requestWilayah($request)
    {
        $wilayah = [];
        
        if ($request->provinsi != NULL) {
            if ($request->provinsi == "") {
                return $this->failedRequest(1);
            } else {
                $wilayah['provinsi'] = $request->provinsi;
            }
        } else {
            $wilayah['provinsi'] = "";
        }
        if ($request->kabkota != NULL) {
            if ($request->kabkota == "") {
                return $this->failedRequest(1);
            } else {
                $wilayah['kabkota'] = $request->kabkota;
            }
        } else {
            $wilayah['kabkota'] = "";
        }
        if ($request->kecamatan != NULL) {
            if ($request->kecamatan == "") {
                return $this->failedRequest(1);
            } else {
                $wilayah['kecamatan'] = $request->kecamatan;
            }
        } else {
            $wilayah['kecamatan'] = "";
        }

        return $wilayah;
    }

    public function hasil($data)
    {
        if (count($data['responden']) == 0) {
            return $this->failedRequest(2);
        } else {
            $data['status'] = "Berhasil";
            $data['message'] = "Data berhasil dipanggil";
            return $data;
        }
    }

    static function statusPencarian($id, $data)
    {
        $status = [];
        if ($id == 0) {
            $status['pencarian'] = 0;
            $status['kolom'] = "";
            $status['data'] = $data;
        } else if ($id == 1) {
            $status['pencarian'] = 1;
            $status['kolom'] = "tahun_lahir";
            $status['data'] = $data;
        } else if ($id == 2) {
            $status['pencarian'] = 1;
            $status['kolom'] = "jenis_kelamin";
            $status['data'] = $data;
        } else if ($id == 3) {
            $status['pencarian'] = 1;
            $status['kolom'] = "responden.pekerjaan";
            $status['data'] = $data;
        } else if ($id == 4) {
            $status['pencarian'] = 1;
            $status['kolom'] = "pendidikan_terakhir";
            $status['data'] = $data;
        }

        return $status;
    }

    public function wilayah(Request $request)
    {
        $wilayah = $this->requestWilayah($request);
        $status = $this->statusPencarian(0, $request->data);

        $data['responden'] = Responden::APIgetResponden($wilayah, $status);
        
        return $this->hasil($data);
    }

    public function tahun_lahir(Request $request)
    {
        $wilayah = $this->requestWilayah($request);

        if ($request->data == null) {            
            return $this->failedRequest(3);
        } else {
            $status = $this->statusPencarian(1, $request->data);
        }

        $data['responden'] = Responden::APIgetResponden($wilayah, $status);
        
        return $this->hasil($data);
    }

    public function jenis_kelamin(Request $request)
    {
        $wilayah = $this->requestWilayah($request);

        if ($request->data == null) {            
            return $this->failedRequest(3);
        } else if ($request->data != 1 && $request->data != 2) {
            return $this->failedRequest(4);
        } else {
            $status = $this->statusPencarian(2, $request->data);
        }

        $data['responden'] = Responden::APIgetResponden($wilayah, $status);
        
        return $this->hasil($data);
    }

    public function pekerjaan(Request $request)
    {
        $wilayah = $this->requestWilayah($request);

        if ($request->data == null) {            
            return $this->failedRequest(3);
        } else if ($request->data < 1 && $request->data > 171) {
            return $this->failedRequest(5);
        } else {
            $status = $this->statusPencarian(3, $request->data);
        }

        $data['responden'] = Responden::APIgetResponden($wilayah, $status);
        
        return $this->hasil($data);
    }

    public function pendidikan_terakhir(Request $request)
    {
        $wilayah = $this->requestWilayah($request);

        if ($request->data == null) {            
            return $this->failedRequest(3);
        } else {
            $status = $this->statusPencarian(4, $request->data);
        }

        $data['responden'] = Responden::APIgetResponden($wilayah, $status);
        
        return $this->hasil($data);
    }
}