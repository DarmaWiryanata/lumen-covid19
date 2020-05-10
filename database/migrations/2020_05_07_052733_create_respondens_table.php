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
            $table->integer('pekerjaan');
            $table->integer('provinsi');
            $table->integer('kabupaten');
            $table->integer('kecamatan');
            $table->integer('desa');
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
