<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('alamat')->unique();
            $table->string('telepon')->unique();
            $table->string('fax')->unique();
            $table->string('foto')->nullable()->default('avatar.png');
            $table->unsignedBigInteger('kab_id');
            $table->timestamps();
        });

        Schema::table('mitra', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kab_id')->references('id')->on('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra');
    }
}
