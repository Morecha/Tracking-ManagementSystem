<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kendaraan')->unsigned()->nullable();
            $table->string('nama')->nullable();
            $table->integer('NIP')->nullable();
            $table->string('contac_person')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
