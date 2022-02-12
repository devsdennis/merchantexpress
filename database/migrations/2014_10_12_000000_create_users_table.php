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
            $table->string('name');
            $table->string('username');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('cust_id')->unsigned();
            $table->integer('dozen_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->char('is_admin')->default(0);
            $table->char('active')->default(0);
            $table->char('cust_flag')->default(0);
            $table->char('merchant_flag')->default(0);
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
