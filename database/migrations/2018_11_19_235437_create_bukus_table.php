<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('name');
            $table->integer('idkategori')->unsigned();
            $table->foreign('idkategori')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('idpenerbit')->unsigned();
            $table->foreign('idpenerbit')->references('id')->on('penerbits')->onDelete('cascade')->onUpdate('cascade');

            $table->string('pengarang')->default('-');
            $table->integer('stok')->default(0);
            $table->integer('price')->default(0);

            $table->softDeletes();
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
        Schema::dropIfExists('bukus');
    }
}
