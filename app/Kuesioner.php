<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    protected $table = "kuesioner";

    protected $fillable = ['kasus_id', 'pertanyaan', 'jawaban', 'kategori', 'status'];

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function respons()
    {
        return $this->hasMany(Response::class);
    }

    static function getPekerjaan()
    {
        $data = array(
            ['pekerjaan' => 'Pelajar/Mahasiswa', 'bidang' => 'Pelajar/Mahasiswa'],
            ['pekerjaan' => 'Tidak/belum bekerja', 'bidang' => 'Tidak/belum bekerja'],
            
            // 1. Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan
            ['pekerjaan' => 'Ahli Pertanian', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Ahli Peternakan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Ahli Perikanan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Ahli Kehutanan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Penyuluhan Pertanian', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Petani', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Pemelihara Pertanian dan Perkebunan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Operator Mesin Pertanian', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Penebang Pohon', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Pengangkut Kayu', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Penyadap Getah', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Peternak', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['pekerjaan' => 'Nelayan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            
            // 2. Bidang Pertambangan dan Pengolahan Logam
            ['pekerjaan' => 'Ahli Tambang', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Eksplorasi', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Survei', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Ahli Mesin Pertambangan', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Pengolah Hasil', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Penggalian', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Peleburan', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Pelapisan', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Penempa', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Pandai Besi', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['pekerjaan' => 'Tenaga Pencetaan Tambang', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            
            // 3. Bidang Industri Pengolahan
            ['pekerjaan' => 'Ahli Teknik Mesin', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Ahli Teknik Industri', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Ahli Teknik Pengolahan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pemintalan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pertenunan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pencelupan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Pengolah atau Ahli Kopi', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Pengolah atau Ahli Teh', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pengolahan Makanan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pengolahan Minuman', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pengolahan Kulit Kayu', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Pengolah atau Ahli Coklat', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Pengolah atau Ahli Sampah', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Pengolah Hasil', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Pengolah Hasil Pertanian', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Ahli Bahan Kimia', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Pengolah Kertas dan Plastik', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Ahli Sepatu dan Barang Kulit', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Ahli Perabot Rumah Tangga', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Penjahit', 'bidang' => 'Bidang Industri Pengolahan'],
            ['pekerjaan' => 'Tenaga Percetakan', 'bidang' => 'Bidang Industri Pengolahan'],
            
            // 4. Bidang Pelistrikan, Gas, dan Air
            ['pekerjaan' => 'Ahli Teknik Listrik dan Elektronika', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Ahli Teknik Gas dan Air', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Tukang Pemasangan Alat Listrik', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Tukang Pemasangan Alat Gas', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Tukang Pemasangan Alat Air', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Pemasangan Alat Elektronika', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Perakit Pesawat Listrik dan Elektronika', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Pemasangan Jaringan Kabel', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Operator Stasiun Pemancar', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Ahli Televisi dan Perekam', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Operator Mesin Pembangkit Tenaga Listrik', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Operator Penyaringan Air', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Operator Pembangkit Gas', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['pekerjaan' => 'Monitor Pesawat Radio', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            
            // 5. Bidang Bangunan dan Jalan
            ['pekerjaan' => 'Arsitek dan Perencanaan', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['pekerjaan' => 'Ahli Teknik Sipil Ahli Analisis', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['pekerjaan' => 'Sistem Tukang Pasang Atap', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['pekerjaan' => 'Tukang Pasang Kaca', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['pekerjaan' => 'Tukang Aspal', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['pekerjaan' => 'Pengemudi Mesin Gilas', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['pekerjaan' => 'Tukang Plester', 'bidang' => 'Bidang Bangunan dan Jalan'],
            
            // 6. Angkutan dan Komunikasi
            ['pekerjaan' => 'Ahli Mesin Kapal', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Ahli Komunikasi', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Penerbang atau Pilot', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Navigator', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Perwira Kapal', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Ahli Mesin Diesel Kereta Api', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Kepala Stasiun', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Pegawai Bandara', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Pegawai Telepon dan Telegraf', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Ekspeditur', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Masinis dan Tukang Api', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Tukang Rem', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Juru Sinyal dan Alat Angkutan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Pengemudi Alat Angkutan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Operator Alat Angkutan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Pegawai Pelabuhan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['pekerjaan' => 'Pegawai Kantor Pos', 'bidang' => 'Angkutan dan Komunikasi'],
            
            // 7. Bidang Perdagangan dan Keuangan
            ['pekerjaan' => 'Ahli Ekonomi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Ahli Keuangan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Ahli Bank', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Manajer', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Bagian Keuangan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Bagian Pemasaran', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Bagian Produksi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Bagian Administrasi dan Personil', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Ahli Akuntansi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Operator Mesin Komputer', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Pengawas Penjualan dan Pembelian', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Agen Pembelian dan Penjualan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Manajer Hotel', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Resepsionis', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Penyedia Makanan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Tenaga Kepariwisataan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Tenaga Perjalanan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Penunjuk Jalan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Tenaga Asuransi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Juru Masak', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Tenaga Pembukuan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Pelayan Restoran', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Operator Mesin Hitung', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['pekerjaan' => 'Tenaga Penjualan dan Pembelian', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            
            // 8. Bidang Jasa
            ['pekerjaan' => 'Tenaga Perawat Muka', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Tenaga Perawat Rambut', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Ahli Kecantikan', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Tenaga Pemadam Kebakaran', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Tukang Pijat', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Penatu', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Perawat dan Pengubur Jenazah', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Perias Pengantin', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Pembantu Rumah Tangga', 'bidang' => 'Bidang Jasa'],
            ['pekerjaan' => 'Pemelihara atau Penjaga Gedung', 'bidang' => 'Bidang Jasa'],
            
            // 9. Bidang Pendidikan, Kebudayaan, dan Agama
            ['pekerjaan' => 'Guru dan Dosen', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Peneliti', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Ulama Islam', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pendeta', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pastur', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Bhiksu', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pedanda', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pelukis', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pemahat', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Penyanyi', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Penari', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pemain Sirkus', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pelawak', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Olahragawan', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pengarang', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Penulis', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Wartawan', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pegawai atau Instansi Film', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Fotografer', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Pemusik', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['pekerjaan' => 'Seniman', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            
            // 10. Bidang Kesehatan
            ['pekerjaan' => 'Dokter', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Perawat', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Ahli Gizi dan Diet', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Ahli Fisioterapi', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Apoteker', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Asisten Apoteker', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Analisis Kesehatan', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Teknisi Alat-alat Medis', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Kesehatan Perawat', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Bidan', 'bidang' => 'Bidang Kesehatan'],
            ['pekerjaan' => 'Ahli Optometrik', 'bidang' => 'Bidang Kesehatan'],
            
            // 11. Bidang Ketatausahaan
            ['pekerjaan' => 'Ahli Administrasi', 'bidang' => 'Bidang Ketatausahaan'],
            ['pekerjaan' => 'Ahli Arsip', 'bidang' => 'Bidang Ketatausahaan'],
            ['pekerjaan' => 'Agendaris', 'bidang' => 'Bidang Ketatausahaan'],
            ['pekerjaan' => 'Juru Steno', 'bidang' => 'Bidang Ketatausahaan'],
            ['pekerjaan' => 'Bendaharawan', 'bidang' => 'Bidang Ketatausahaan'],
            ['pekerjaan' => 'Juru Tik', 'bidang' => 'Bidang Ketatausahaan'],
            
            // 12. Bidang Kemasyarakatan
            ['pekerjaan' => 'Ahli Hukum', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Pengacara', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Hakim', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Jaksa', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Panitera', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Notaris', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Kutaror', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Ahli Sosiologi', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Ahli Bahasa', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Penerjemah', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Juru Bahasa atau Bicara', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Ahli Kependidikan', 'bidang' => 'Bidang Kemasyarakatan'],
            ['pekerjaan' => 'Pustakawan', 'bidang' => 'Bidang Kemasyarakatan'],
        );

        return $data;
    }
}