<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magang', function (Blueprint $table) {
            $table->id('id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->unsignedBigInteger('mhs_id');
            $table->unsignedBigInteger('dosen_id')->nullable();
            $table->unsignedBigInteger('lowongan_id');
            $table->unsignedBigInteger('logbook_id')->nullable();
            $table->timestamps();
        });

        Schema::table('magang', function ($table) {
            $table->foreign('mhs_id')->references('id')->on('mahasiswa');
            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->foreign('lowongan_id')->references('id')->on('lowongan');
            $table->foreign('logbook_id')->references('id')->on('logbook');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magang');
    }
}
