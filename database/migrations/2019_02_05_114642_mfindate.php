<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mfindate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('travauxes', function ( $table) {
           
      
        $table->date('fin_date')->nullable()->change();
 
       });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travauxes', function ( $table) {
         
            $table->dropColumn('fin_date');

          
            //
        });//
    }
}
