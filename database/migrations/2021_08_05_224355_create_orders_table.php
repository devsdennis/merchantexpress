<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('status');
            $table->string('location');
            $table->char('location_flag');
            $table->char('used_flag')->default(0);
            $table->string('transaction');
            $table->float('amount');
            $table->float('merchant_amount');
            $table->float('company_amount');
            $table->float('rate')->default(0);
            $table->integer('code');
            $table->integer('merchant_id')->unsigned();
            $table->integer('bundle_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
