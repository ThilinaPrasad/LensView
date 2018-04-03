<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voter_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('voter_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('image_id')
            ->references('id')->on('images')
            ->onDelete('cascade');
        });

        DB::statement( "CREATE VIEW  votes_count(image_id,vote_count) AS SELECT image_id,COUNT(*) FROM votes GROUP BY image_id" );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
