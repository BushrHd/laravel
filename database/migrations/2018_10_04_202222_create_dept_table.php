<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    ///  make the schema of the database
    public function up()
    {
        Schema::create('dept', function (Blueprint $table) {
            $table->increments('id'); // id that will be auto increment and primary key
            $table -> string('title');
            $table -> text ('description');
            $table -> softDeletes();


            $table->timestamps(); // two columns that define the row that has been created at and updated at 

            // so these three columns or attributes are necessay for each table so laravel developers intend to add them for each table schema
        


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // destoroy the data schema 
    public function down()
    {
        Schema::dropIfExists('dept');
    }
}
