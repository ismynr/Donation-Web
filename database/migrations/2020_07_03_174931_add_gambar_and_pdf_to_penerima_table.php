<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarAndPdfToPenerimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penerima', function (Blueprint $table) {
            $table->string('gambar')->nullable();
            $table->string('pdf')->nullable()->after('id_penerima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penerima', function (Blueprint $table) {
            $table->dropColumn('gambar');
            $table->string('pdf')->nullable();
        });
    }
}
