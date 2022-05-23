<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenumpangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kendaraan')->unsigned()->nullable();
            $table->string('kode_penumpang')->nullable();
            $table->string('atas_nama')->nullable();
            $table->timestamps();

            $table->foreign('id_kendaraan')->references('id')->on('kendaraans')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penumpangs');
    }
}
