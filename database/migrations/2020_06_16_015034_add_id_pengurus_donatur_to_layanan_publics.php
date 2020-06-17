<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPengurusDonaturToLayananPublics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('layanan_publics', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengurus')->after('id')->nullable();
            $table->unsignedBigInteger('id_donatur')->after('id_pengurus')->nullable();
            $table->boolean('read')->default(0);
            $table->boolean('reply')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('layanan_publics', function (Blueprint $table) {
            $table->dropColumn('id_pengurus');
            $table->dropColumn('id_donatur');
            $table->dropColumn('read');
            $table->dropColumn('reply');
        });
    }
}
