<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('order_id');
            $table->integer('user_id');
            $table->integer('agency_id')->default(1);
            $table->text('pickup_lat');
            $table->text('pickup_lng');
            $table->text('pickup_location');
            $table->text('drop_lat');
            $table->text('drop_lng');
            $table->text('drop_location');
            $table->integer('vehicle_id');
            $table->text('goods_id');
            $table->float('price');
            $table->integer('date');
            $table->tinyInteger('order_status')->default(0);
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
