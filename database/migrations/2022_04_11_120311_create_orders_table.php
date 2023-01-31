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
            $table->increments('id');
            $table->string('seller_id')->nullable();
            $table->integer('cust_id');
            $table->integer('cust_add_id');
            $table->string('cart_id')->nullable();
            $table->integer('product_id')->default(0);
            $table->integer('qty')->default(0);
            $table->integer('payment_mode')->default(0);
            $table->integer('status')->default(1);
            $table->integer('isDelivered')->default(1);
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
