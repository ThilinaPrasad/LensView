<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Laravel\User;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->string('type')->default("public");
            $table->integer('receiver_id')->unsigned();
            $table->mediumText('messege');
            $table->mediumText('img_link')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->index(['status']);
            
            $table->foreign('sender_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
            $table->foreign('receiver_id')
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
        Schema::dropIfExists('notifications');
    }
}
