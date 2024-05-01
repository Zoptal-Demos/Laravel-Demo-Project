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
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('phone_number');
            $table->tinyInteger('user_type')->comment('0=>user,1=>agency,2=>admin')->default(0);
            $table->tinyInteger('user_status')->comment('0=>Not Verified,1=>Verified')->default(0);
            $table->integer('otp')->comment('otp for login')->nullable();
            $table->text('lat')->comment('latitude of user')->nullable();
            $table->text('lng')->comment('longitude of user')->nullable();
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
