<?php

use App\Sumber;
use Illuminate\Database\Seeder;

class SumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sumber::create([
            'kasus_id' => 1,
            'nama' => 'WHO Myth Busters',
            'url' => 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public/myth-busters'
        ]);
        
        Sumber::create([
            'kasus_id' => 1,
            'nama' => 'Suara Surabaya',
            'url' => 'https://www.suarasurabaya.net/kelanakota/2020/perbedaan-psbb-dan-karantina-wilayah/'
        ]);

        Sumber::create([
            'kasus_id' => 1,
            'nama' => 'Science News',
            'url' => 'https://www.sciencenews.org/article/coronavirus-covid-19-not-human-made-lab-genetic-analysis-nature'
        ]);
    }
}
