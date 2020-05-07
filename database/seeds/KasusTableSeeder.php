<?php

use App\Kasus;
use Illuminate\Database\Seeder;

class KasusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kasus::create([
            'nama' => 'Coronavirus Disease 2019 (COVID-19)',
            'slug' => 'coronavirus-disease-2019',
            'status' => 1
        ]);
    }
}
