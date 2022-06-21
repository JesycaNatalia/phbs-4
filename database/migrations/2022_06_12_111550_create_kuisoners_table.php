<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuisoners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ppemantauan_id')->unsigned();
            $table->string('pertanyaan');
            $table->text('penjelasan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ppemantauan_id')->references('id')->on('ppemantauans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuisoners');
    }
}
