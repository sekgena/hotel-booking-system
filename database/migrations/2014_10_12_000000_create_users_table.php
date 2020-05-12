<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 60)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //Create admin user
        DB::table('users')->insert(
            array(
                'first_name' => "Admin",
                'last_name' => "Admin",
                'email' => 'admin@domain.com',
                'password' => bcrypt("admin")
            )
        );

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
