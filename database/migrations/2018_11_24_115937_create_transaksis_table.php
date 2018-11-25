<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idbuku')->unsigned();
            $table->foreign('idbuku')->references('id')->on('bukus')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('idmember')->unsigned();
            $table->foreign('idmember')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');

            $table->string('kodepinjam')->nullable();
            $table->string('kodekembali')->nullable();
            $table->date('tgl');
            $table->integer('denda')->default(0);
            $table->string('status')->default('Pinjam');
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
        Schema::dropIfExists('transaksis');
    }
}
