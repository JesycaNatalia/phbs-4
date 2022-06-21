<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsiKuisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_kuisoners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kuisoner_id')->unsigned();
            $table->string('jawaban');
            $table->bigInteger('skor');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('kuisoner_id')->references('id')->on('kuisoners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isi_kuisoners');
    }
}
