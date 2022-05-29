<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jalur')->unsigned()->nullable();
            $table->string('no_kendaraan')->nullable();
            $table->string('no_plat')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->integer('jumlah_penumpang')->nullable();
            $table->integer('jumlah_penumpang_now')->nullable();
            $table->string('api')->nullable();
            $table->timestamps();

            $table->foreign('id_jalur')->references('id')->on('jalurs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
