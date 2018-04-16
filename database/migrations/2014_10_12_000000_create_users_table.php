<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Laravel\Models\Role;
use Laravel\User;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address','500');
            $table->string('telephone','10');
            $table->integer('role_id')->unsigned()->default(1);
            $table->mediumText('profile_pic');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            

            $table->foreign('role_id')
            ->references('id')->on('roles')
            ->onUpdate('cascade');
            
        });

        Role::create([
            'id'=>'1',
            'name' =>'Voter'
        ]);
        Role::create([
            'id'=>'2',
            'name' =>'Photographer'
        ]);
        Role::create([
            'id'=>'3',
            'name' =>'Contest Organizer'
        ]);

        User::create([
            'name' => 'LensView',
            'email' => 'info@lensview.com',
            'address' => 'LensView.inc, University of Moratuwa',
            'telephone' => '0716485403',
            'role_id' => '3',
            'profile_pic' => 'lensview.jpg',
            'password' => bcrypt('admin@lensview'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
