<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travauxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('NULL');
            $table->string('url_pdf')->default('NULL');
            $table->date('fin_date');
            $table->integer('cour_id')->unsigned();
            $table->foreign('cour_id')->references('id')->on('catcours')->onDelete('cascade');
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
        Schema::dropIfExists('travauxes');
    }
}
