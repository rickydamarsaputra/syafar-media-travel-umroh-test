<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('village_id');
            $table->string('jenis_kelamin');
            $table->string('no_paspor');
            $table->date('masa_berlaku_paspor');
            $table->string('ktp');
            $table->string('kk');
            $table->string('foto_diri');
            $table->string('paspor');
            $table->string('no_visa');
            $table->date('berlaku_sampai');
            $table->string('jenis_paket');
            $table->string('jenis_kamar');


            $table->foreign('province_id')->references('id')->on('indonesia_provinces');
            $table->foreign('city_id')->references('id')->on('indonesia_cities');
            $table->foreign('district_id')->references('id')->on('indonesia_districts');
            $table->foreign('village_id')->references('id')->on('indonesia_villages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaahs');
    }
};
