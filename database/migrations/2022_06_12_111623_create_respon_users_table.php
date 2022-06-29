<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respon_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ppemantauan_id')->unsigned();
            $table->bigInteger('bulan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('kartu_keluarga_id')->unsigned();
            $table->bigInteger('total_skor');
            $table->bigInteger('skor_nol');
            $table->timestamps();

            $table->foreign('ppemantauan_id')->references('id')->on('ppemantauans')->onDelete('cascade');
            $table->foreign('bulan_id')->references('id')->on('bulans')->onDelete('cascade');
            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluargas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respon_users');
    }
}
