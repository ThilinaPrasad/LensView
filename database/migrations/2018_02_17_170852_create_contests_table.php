<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->longText('description');
            $table->mediumText('cover_img');
            $table->date('sub_start_at');
            $table->date('sub_end_at');
            $table->date('closed_at');
            $table->string('prize');
            $table->longText('prize_description');
            $table->mediumText('prize_image');
            $table->timestamps();

            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        DB::statement( "CREATE VIEW  submission_contests AS SELECT * FROM contests  WHERE sub_start_at <= CURDATE() and sub_end_at >= CURDATE() ORDER By sub_start_at" );
        DB::statement( "CREATE VIEW  voting_contests AS SELECT * FROM contests  WHERE sub_end_at < CURDATE() and closed_at >= CURDATE() ORDER BY sub_end_at desc" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
        DB::statement( 'DROP VIEW submission_contests' );
        DB::statement( 'DROP VIEW voting_contests' );
    }
}
