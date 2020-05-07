<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responden', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_lahir', 4);
            $table->boolean('jenis_kelamin');
            $table->string('pendidikan_terakhir', 15);
            $table->string('pekerjaan', 50);
            $table->string('provinsi', 50);
            $table->string('kabupaten', 100);
            $table->string('kecamatan', 100);
            $table->string('desa', 100);
            $table->string('informasi', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responden');
    }
}
