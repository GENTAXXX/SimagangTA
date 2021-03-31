<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama')->unique();
            $table->string('NIM')->unique();
            $table->string('telepon')->unique();
            $table->string('pengalaman')->nullable();
            $table->string('jurusan');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('skill_id')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->date('tgl_lahir')->nullable();
            $table->string('foto')->nullable()->default('avatar.png');
            $table->timestamps();
        });

        Schema::table('mahasiswa', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('skill_id')->references('id')->on('skill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
