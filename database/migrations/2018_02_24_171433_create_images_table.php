<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('contest_id')->unsigned();
            $table->string('title');
            $table->mediumText('description');
            $table->mediumText('image');
            $table->integer('category_id')->unsigned();
            $table->string('downloadable',5)->nullable();
            $table->timestamps();
            
            

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onUpdate('cascade');
            $table->foreign('contest_id')
            ->references('id')->on('contests')
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
