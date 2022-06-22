<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ppemantauan_id')->unsigned();
            $table->bigInteger('bulan_id')->unsigned();
            $table->bigInteger('kuisoner_id')->unsigned();
            $table->bigInteger('isi_kuisoner_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('ppemantauan_id')->references('id')->on('ppemantauans')->onDelete('cascade');
            $table->foreign('bulan_id')->references('id')->on('bulans')->onDelete('cascade');
            $table->foreign('kuisoner_id')->references('id')->on('kuisoners')->onDelete('cascade');
            $table->foreign('isi_kuisoner_id')->references('id')->on('isi_kuisoners')->onDelete('cascade');
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
        Schema::dropIfExists('jawaban_users');
    }
}
