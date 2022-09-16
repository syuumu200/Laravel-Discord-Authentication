<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username');
            $table->unsignedSmallInteger('discriminator');
            // $table->string('email'); //必要ならコメントアウトしてください。
            $table->string('avatar')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('locale');
            $table->boolean('mfa_enabled');
            $table->string('refresh_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
