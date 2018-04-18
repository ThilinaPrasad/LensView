<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reviewer_id')->unsigned();
            $table->integer('contest_id')->unsigned();
            $table->integer('img_id')->unsigned();
            $table->mediumText('comment');
            $table->timestamps();

            $table->foreign('reviewer_id')
            ->references('winner_id')->on('winners')
            ->onDelete('cascade');

            $table->foreign('img_id')
            ->references('img_id')->on('winners')
            ->onDelete('cascade');

            $table->foreign('contest_id')
            ->references('contest_id')->on('winners')
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
        Schema::dropIfExists('reviews');
    }
}
