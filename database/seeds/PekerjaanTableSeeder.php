<?php

use Illuminate\Database\Seeder;

use App\Pekerjaan;

class PekerjaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pekerjaan = array(
            ['nama' => 'Pelajar/Mahasiswa', 'bidang' => 'Pelajar/Mahasiswa'],
            ['nama' => 'Tidak/belum bekerja', 'bidang' => 'Tidak/belum bekerja'],
            ['nama' => 'Lain-lain', 'bidang' => 'Lain-lain'],
            
            // 1. Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan
            ['nama' => 'Ahli Pertanian', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Ahli Peternakan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Ahli Perikanan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Ahli Kehutanan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Penyuluhan Pertanian', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Petani', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Pemelihara Pertanian dan Perkebunan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Operator Mesin Pertanian', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Penebang Pohon', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Pengangkut Kayu', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Penyadap Getah', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Peternak', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            ['nama' => 'Nelayan', 'bidang' => 'Bidang Pertanian, Peternakan, Perikanan, dan Kehutanan'],
            
            // 2. Bidang Pertambangan dan Pengolahan Logam
            ['nama' => 'Ahli Tambang', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Eksplorasi', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Survei', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Ahli Mesin Pertambangan', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Pengolah Hasil', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Penggalian', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Peleburan', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Pelapisan', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Penempa', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Pandai Besi', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            ['nama' => 'Tenaga Pencetaan Tambang', 'bidang' => 'Bidang Pertambangan dan Pengolahan Logam'],
            
            // 3. Bidang Industri Pengolahan
            ['nama' => 'Ahli Teknik Mesin', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Ahli Teknik Industri', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Ahli Teknik Pengolahan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pemintalan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pertenunan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pencelupan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Pengolah atau Ahli Kopi', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Pengolah atau Ahli Teh', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pengolahan Makanan', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pengolahan Minuman', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pengolahan Kulit Kayu', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Pengolah atau Ahli Coklat', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Pengolah atau Ahli Sampah', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Pengolah Hasil', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Pengolah Hasil Pertanian', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Ahli Bahan Kimia', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Pengolah Kertas dan Plastik', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Ahli Sepatu dan Barang Kulit', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Ahli Perabot Rumah Tangga', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Penjahit', 'bidang' => 'Bidang Industri Pengolahan'],
            ['nama' => 'Tenaga Percetakan', 'bidang' => 'Bidang Industri Pengolahan'],
            
            // 4. Bidang Pelistrikan, Gas, dan Air
            ['nama' => 'Ahli Teknik Listrik dan Elektronika', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Ahli Teknik Gas dan Air', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Tukang Pemasangan Alat Listrik', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Tukang Pemasangan Alat Gas', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Tukang Pemasangan Alat Air', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Pemasangan Alat Elektronika', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Perakit Pesawat Listrik dan Elektronika', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Pemasangan Jaringan Kabel', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Operator Stasiun Pemancar', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Ahli Televisi dan Perekam', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Operator Mesin Pembangkit Tenaga Listrik', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Operator Penyaringan Air', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Operator Pembangkit Gas', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            ['nama' => 'Monitor Pesawat Radio', 'bidang' => 'Bidang Pelistrikan, Gas, dan Air'],
            
            // 5. Bidang Bangunan dan Jalan
            ['nama' => 'Arsitek dan Perencanaan', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['nama' => 'Ahli Teknik Sipil Ahli Analisis', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['nama' => 'Sistem Tukang Pasang Atap', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['nama' => 'Tukang Pasang Kaca', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['nama' => 'Tukang Aspal', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['nama' => 'Pengemudi Mesin Gilas', 'bidang' => 'Bidang Bangunan dan Jalan'],
            ['nama' => 'Tukang Plester', 'bidang' => 'Bidang Bangunan dan Jalan'],
            
            // 6. Angkutan dan Komunikasi
            ['nama' => 'Ahli Mesin Kapal', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Ahli Komunikasi', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Penerbang atau Pilot', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Navigator', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Perwira Kapal', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Ahli Mesin Diesel Kereta Api', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Kepala Stasiun', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Pegawai Bandara', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Pegawai Telepon dan Telegraf', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Ekspeditur', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Masinis dan Tukang Api', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Tukang Rem', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Juru Sinyal dan Alat Angkutan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Pengemudi Alat Angkutan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Operator Alat Angkutan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Pegawai Pelabuhan', 'bidang' => 'Angkutan dan Komunikasi'],
            ['nama' => 'Pegawai Kantor Pos', 'bidang' => 'Angkutan dan Komunikasi'],
            
            // 7. Bidang Perdagangan dan Keuangan
            ['nama' => 'Ahli Ekonomi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Ahli Keuangan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Ahli Bank', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Manajer', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Bagian Keuangan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Bagian Pemasaran', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Bagian Produksi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Bagian Administrasi dan Personil', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Ahli Akuntansi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Operator Mesin Komputer', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Pengawas Penjualan dan Pembelian', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Agen Pembelian dan Penjualan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Manajer Hotel', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Resepsionis', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Penyedia Makanan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Tenaga Kepariwisataan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Tenaga Perjalanan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Penunjuk Jalan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Tenaga Asuransi', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Juru Masak', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Tenaga Pembukuan', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Pelayan Restoran', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Operator Mesin Hitung', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            ['nama' => 'Tenaga Penjualan dan Pembelian', 'bidang' => 'Bidang Perdagangan dan Keuangan'],
            
            // 8. Bidang Jasa
            ['nama' => 'Tenaga Perawat Muka', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Tenaga Perawat Rambut', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Ahli Kecantikan', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Tenaga Pemadam Kebakaran', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Tukang Pijat', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Penatu', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Perawat dan Pengubur Jenazah', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Perias Pengantin', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Pembantu Rumah Tangga', 'bidang' => 'Bidang Jasa'],
            ['nama' => 'Pemelihara atau Penjaga Gedung', 'bidang' => 'Bidang Jasa'],
            
            // 9. Bidang Pendidikan, Kebudayaan, dan Agama
            ['nama' => 'Guru dan Dosen', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Peneliti', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Ulama Islam', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pendeta', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pastur', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Bhiksu', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pedanda', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pelukis', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pemahat', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Penyanyi', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Penari', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pemain Sirkus', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pelawak', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Olahragawan', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pengarang', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Penulis', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Wartawan', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pegawai atau Instansi Film', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Fotografer', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Pemusik', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            ['nama' => 'Seniman', 'bidang' => 'Bidang Pendidikan, Kebudayaan, dan Agama'],
            
            // 10. Bidang Kesehatan
            ['nama' => 'Dokter', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Perawat', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Ahli Gizi dan Diet', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Ahli Fisioterapi', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Apoteker', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Asisten Apoteker', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Analisis Kesehatan', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Teknisi Alat-alat Medis', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Kesehatan Perawat', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Bidan', 'bidang' => 'Bidang Kesehatan'],
            ['nama' => 'Ahli Optometrik', 'bidang' => 'Bidang Kesehatan'],
            
            // 11. Bidang Ketatausahaan
            ['nama' => 'Ahli Administrasi', 'bidang' => 'Bidang Ketatausahaan'],
            ['nama' => 'Ahli Arsip', 'bidang' => 'Bidang Ketatausahaan'],
            ['nama' => 'Agendaris', 'bidang' => 'Bidang Ketatausahaan'],
            ['nama' => 'Juru Steno', 'bidang' => 'Bidang Ketatausahaan'],
            ['nama' => 'Bendaharawan', 'bidang' => 'Bidang Ketatausahaan'],
            ['nama' => 'Juru Tik', 'bidang' => 'Bidang Ketatausahaan'],
            
            // 12. Bidang Kemasyarakatan
            ['nama' => 'Ahli Hukum', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Pengacara', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Hakim', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Jaksa', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Panitera', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Notaris', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Kutaror', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Ahli Sosiologi', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Ahli Bahasa', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Penerjemah', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Juru Bahasa atau Bicara', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Ahli Kependidikan', 'bidang' => 'Bidang Kemasyarakatan'],
            ['nama' => 'Pustakawan', 'bidang' => 'Bidang Kemasyarakatan'],
        );

        foreach ($pekerjaan as $item) {
            Pekerjaan::create([
                'nama' => $item['nama'],
                'bidang' => $item['bidang']
            ]);
        }
    }
}
