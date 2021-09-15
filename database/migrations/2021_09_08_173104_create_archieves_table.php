<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchievesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archieves', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('tanggal_input');
            $table->string('nik');
            $table->string('nopen');
            $table->string('nama');
            $table->dateTime('tanggal_lahir');
            $table->string('alamat_jalan');
            $table->string('alamat_kec');
            $table->string('alamat_kotakab');
            $table->string('alamat_propinsi');
            $table->string('telepon');
            $table->integer('pembiayaan');
            $table->integer('tenor');
            $table->integer('cicilan');
            $table->integer('gaji_pokok');
            $table->boolean('status');
            $table->string('url_ktp')->nullable();
            $table->string('url_kk')->nullable();
            $table->string('url_karip')->nullable();
            $table->string('url_sk_pensiun')->nullable();
            $table->string('url_video_interview')->nullable();
            $table->string('url_video_kesehatan')->nullable();
            $table->dateTime('tanggal_keputusan')->nullable();
            $table->integer('keputusan_bank')->default(0);
            $table->integer('keputusan_asuransi')->default(0);
            $table->string('url_pdf')->nullable();
            $table->dateTime('tanggal_archieve')->nullable();
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
        Schema::dropIfExists('archieves');
    }
}
