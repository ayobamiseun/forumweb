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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('signature')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->boolean('is_administrator')->default(FALSE);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'user_name' => 'Admin',
                // 'email' => 'forumadmin@vanhack.com',
                'email' => 'adegokeayobami1@gmail.com',
                'password' => bcrypt('admin'),
                'is_administrator' => TRUE
            ]
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
