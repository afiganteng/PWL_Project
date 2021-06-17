<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServisMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis_motor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('mekanik_id');
            $table->unsignedBigInteger('sparepart_id');
            $table->integer('qty');
            $table->integer('harga_sparepart');
            $table->integer('harga_jasa');
            $table->integer('total_bayar');
            $table->date('tanggal');
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('mekanik_id')->references('id_mekanik')->on('mekanik')->onDelete('cascade');
            $table->foreign('sparepart_id')->references('id_sparepart')->on('sparepart')->onDelete('cascade');
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
        Schema::dropIfExists('servis_motor');
    }
}
