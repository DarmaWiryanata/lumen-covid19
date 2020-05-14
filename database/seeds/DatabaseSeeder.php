<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('InfoTableSeeder');
        $this->call('KasusTableSeeder');
        $this->call('KuesionerTableSeeder');
        $this->call('PekerjaanTableSeeder');
        $this->call('SumberTableSeeder');
    }
}
