<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('creater_id')->unsigned();
            $table->timestamps();

            $table->foreign('creater_id')->references('id')->on('users')->onDelete('cascade');


        });
        DB::statement( "INSERT INTO categories (name,creater_id) VALUE ('Nature','1')" );
        DB::statement( "INSERT INTO categories (name,creater_id) VALUE ('Wild','1')" );
        DB::statement( "INSERT INTO categories (name,creater_id) VALUE ('Technology','1')" );
        DB::statement( "INSERT INTO categories (name,creater_id) VALUE ('Animals','1')" );
        DB::statement( "INSERT INTO categories (name,creater_id) VALUE ('Black & White','1')" );
        DB::statement( "INSERT INTO categories (name,creater_id) VALUE ('Landscapes','1')" );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
