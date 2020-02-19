<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrvetudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trvetuds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_trv');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_trv')->unsigned();
            $table->foreign('id_trv')->references('id')->on('travauxes')->onDelete('cascade');
            $table->integer('id_cat')->unsigned();
            $table->foreign('id_cat')->references('id')->on('catcours')->onDelete('cascade'); 
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
        Schema::dropIfExists('trvetuds');
    }
}
