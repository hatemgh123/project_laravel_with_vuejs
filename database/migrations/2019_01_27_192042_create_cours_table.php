<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');    
            $table->string('title')->default('NULL');
            $table->string('url_pdf')->default('NULL');
            $table->string('body')->default('NULL');
            $table->string('url_video')->default('NULL');
            $table->integer('chap_id')->unsigned();
            $table->foreign('chap_id')->references('id')->on('chaps')->onDelete('cascade');
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
        Schema::dropIfExists('cours');
    }
}
