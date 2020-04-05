<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima', function (Blueprint $table) {
            $table->bigIncrements('id_penerima');
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->date('tgl_lahir');
            $table->char('jenkel',1);
            $table->integer('umur');
            $table->integer('jumkel');
            $table->integer('penghasilan');
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
        Schema::dropIfExists('penerima');
    }
}
