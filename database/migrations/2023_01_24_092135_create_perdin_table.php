<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerdinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_asal');
            $table->foreign('kota_asal')->references('id')->on('kota');
            $table->unsignedBigInteger('kota_tujuan');
            $table->foreign('kota_tujuan')->references('id')->on('kota');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('keterangan');
            $table->double('jarak');
            $table->double('total_uang');
            $table->integer('total_hari');
            $table->enum('status', ['setuju', 'tolak']);
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
        Schema::dropIfExists('perdin');
    }
}
