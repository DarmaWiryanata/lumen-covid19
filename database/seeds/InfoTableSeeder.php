<?php

use Illuminate\Database\Seeder;

use App\Info;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::create([
            'nama' => 'Lingkungan Sekitar',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Media Sosial (Facebook, Instagram, Twitter, dll.)',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Televisi/Radio',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Aplikasi Chat (WhatsApp, Facebook Messenger, Telegram, dll.)',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Baliho/Spanduk',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Media Cetak (Koran, Majalah, dll.)',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Media Digital (Berita Online)',
            'status' => 1
        ]);
        
        Info::create([
            'nama' => 'Penelusuran Mesin Pencarian (Google, Bing, DuckDuckGo, dll.)',
            'status' => 1
        ]);
    }
}
